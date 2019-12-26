<?php

require_once(__DIR__ . '/../vendor/autoload.php');

function getConfiguration()
{
    // Configure HTTP basic authorization: Basic
    $config = TmApi\Configuration::getDefaultConfiguration()
        ->setHost('http://localhost:7007/tmapi/v1')
        ->setUsername('user')
        ->setPassword('');
    return $config;
}

// Api Test
class ApiTest extends \PHPUnit_Framework_TestCase
{    
    private static $testTexts = array(
        'Elvis Presley was born in Tupelo, Mississippi.', 
        'Elvis Presley was an American singer');
    
    private function getDocuments($texts)
    {
        $files = array();
        foreach ($texts as $text) {
            $doc = new TmApi\Model\Document();
            $doc->setContent(base64_encode($text));
            $files[] = $doc;
        }
        $documents = new TmApi\Model\Documents();
        $documents->setFiles($files);
        return $documents;
    }

    // test limits
    public function testLimits()
    {
        $apiInstance = new TmApi\Api\LimitsApi(new GuzzleHttp\Client(), getConfiguration());
        $result = $apiInstance->getLimits(); 
        // check no throws
        $this->assertTrue(true);
    }

    // test server info
    public function testServerInfo()
    {
        $apiInstance = new TmApi\Api\ServerApi(new GuzzleHttp\Client(), getConfiguration());
        $result = $apiInstance->getServerInfo(); 
        $this->assertGreaterThan(0, count($result->getLanguages()));
    }

    // test language detection
    public function testLanguage()
    {
        $apiInstance = new TmApi\Api\OperationsApi(new GuzzleHttp\Client(), getConfiguration());
        $result = $apiInstance->getLanguages(self::$testTexts[0]);
        $this->assertCount(1, $result->getDocuments());        
        $this->assertTrue($result->getDocuments()[0]['language'] == 'English');
    }

    public function testDocumentsLanguage()
    {
        $apiInstance = new TmApi\Api\OperationsApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);
        $result = $apiInstance->getDocumentsLanguages($documents);
        $this->assertTrue(count($documents->getFiles()) == count($result->getDocuments())); 
        foreach ($result->getDocuments() as $doc) {
            $this->assertTrue($doc['language'] == 'English');
        }        
    }      
    
    // test tokens
    public function testTokens()
    {
        $apiInstance = new TmApi\Api\OperationsApi(new GuzzleHttp\Client(), getConfiguration());
        $result = $apiInstance->extractTokens(self::$testTexts[0]);
        $this->assertCount(1, $result->getDocuments());        
        $this->assertCount(1, $result->getDocuments()[0]->getSentences());
        $this->assertTrue(count($result->getDocuments()[0]->getSentences()[0]->getTokens()) > 0);
    }

    public function testDocumentsTokens()
    {
        $apiInstance = new TmApi\Api\OperationsApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);
        $result = $apiInstance->extractDocumentsTokens($documents);
        $this->assertTrue(count($documents->getFiles()) == count($result->getDocuments())); 
        foreach ($result->getDocuments() as $doc) {
            $this->assertTrue(count($doc->getSentences()[0]->getTokens()) > 0);
         }        
    }

    // operations
    public function runOperation($object, $operation, $text)
    {
        $apiInstance = new TmApi\Api\OperationsApi(new GuzzleHttp\Client(), getConfiguration());
        $result = $apiInstance->$operation($text);
        $this->assertCount(1, $result->getDocuments());        
        $this->assertTrue(count($result->getDocuments()[0]->$object()) > 0);
    }

    public function runDocumentsOperation($object, $operation, $documents)
    {
        $apiInstance = new TmApi\Api\OperationsApi(new GuzzleHttp\Client(), getConfiguration());
        $result = $apiInstance->$operation($documents);
        $this->assertTrue(count($documents->getFiles()) == count($result->getDocuments())); 
        foreach ($result->getDocuments() as $doc) {
           $this->assertTrue(count($doc->$object()) > 0);
        }        
    }

    // keywords
    public function testKeywords()
    {
        $this->runOperation('getKeywords', 'extractKeywords', self::$testTexts[0]);
    }

    public function testDocumentsKeywords()
    {
        $this->runDocumentsOperation('getKeywords', 'extractDocumentsKeywords', $this->getDocuments(self::$testTexts));
    }    

    // entities
    public function testEntities()
    {
        $this->runOperation('getEntities', 'extractEntities', self::$testTexts[0]);
    }

    public function testDocumentsEntities()
    {
        $this->runDocumentsOperation('getEntities', 'extractDocumentsEntities', $this->getDocuments(self::$testTexts));
    }    

    // sentiments
    private static $sentimentsTexts = array(
        'New menu is good but the place in Toronto is dirty.',
        'Pretty good food on average');

    public function testSentiments()
    {
        $this->runOperation('getSentiments', 'extractSentiments', self::$sentimentsTexts[0]);
    }

    public function testDocumentsSentiments()
    {
        $this->runDocumentsOperation('getSentiments', 'extractDocumentsSentiments', $this->getDocuments(self::$sentimentsTexts));
    }    

    // facts
    public function testFacts()
    {
        $this->runOperation('getFacts', 'extractFacts', self::$testTexts[0]);
    }

    public function testDocumentsFacts()
    {
        $this->runDocumentsOperation('getFacts', 'extractDocumentsFacts', $this->getDocuments(self::$testTexts));
    }    

    // tasks
    public function testTasksInfo()
    {
        $apiInstance = new TmApi\Api\TasksApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);
        $result = $apiInstance->createTask(array('tokens'), $documents, 1);
        $taskId = $result['taskId'];
        // all tasks
        $all = $apiInstance->getTasksInfo(array(''));
        $this->assertTrue(count($all->getTasks()) > 0);
        $found = false;
        foreach ($all->getTasks() as $task) {
            if ($task['id'] == $taskId) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found);
        // concrete task
        $info = $apiInstance->getTasksInfo(array($taskId));
        $this->assertCount(1, $info->getTasks());
        $this->assertTrue($info->getTasks()[0]['id'] == $taskId);
    } 

    public function testDeleteTask()
    {
        $apiInstance = new TmApi\Api\TasksApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);
        $result = $apiInstance->createTask(array('tokens'), $documents, 1);
        $taskId = $result['taskId'];
        $info = $apiInstance->getTasksInfo(array($taskId));
        $this->assertCount(1, $info->getTasks());
        $apiInstance->deleteTasks(array($taskId));
        $info = $apiInstance->getTasksInfo(array($taskId));
        $this->assertTrue(empty($info->getTasks()));
    }

    public function testSyncTask()
    {
        $apiInstance = new TmApi\Api\TasksApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);        
        $result = $apiInstance->createTask(array('entities'), $documents, 0);
        $this->assertTrue(count($documents->getFiles()) == count($result['documents'])); 
        $this->assertTrue(count(((array)$result['documents'][0])['entities']) > 0);
        $this->assertTrue(count(((array)$result['documents'][0])['entities']) > 0);
    }

    public function testAsyncTask()
    {
        $apiInstance = new TmApi\Api\TasksApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);        
        $result = $apiInstance->createTask(array('entities'), $documents, 1);
        $taskId = $result['taskId'];
        while (true) {
            $info = $apiInstance->getTasksInfo(array($taskId));
            if ($info->getTasks()[0]->getDone() == 100)
                break;
        }
        $result = $apiInstance->getTaskResult($taskId, array('entities'));
        $this->assertTrue(count($documents->getFiles()) == count($result['documents'])); 
        $this->assertTrue(count(((array)$result['documents'][0])['entities']) > 0);
    }
  
    public function testMultipleTask()
    {
        $apiInstance = new TmApi\Api\TasksApi(new GuzzleHttp\Client(), getConfiguration());
        $documents = $this->getDocuments(self::$testTexts);        
        $operations = array('tokens', 'entities');
        $taskIds = array();
        // create tasks
        foreach ($operations as $operation) {
            $res = $apiInstance->createTask(array($operation), $documents, 1);
            $taskIds[] = $res['taskId'];            
        }
        // wait till finished
        while (true) {
            $info = $apiInstance->getTasksInfo($taskIds);
            $this->assertTrue(count($taskIds) == count($info->getTasks()));
            $allFinished = true;
            foreach ($info->getTasks() as $task) {
                if ($task['done'] < 100) {
                    $allFinished = false;
                    break;
                }
            }
            if ($allFinished)
                break;
        }
        // check results
        for ($i = 0; $i != count($operations); $i++) {
            $result = $apiInstance->getTaskResult($taskIds[$i], $operations[$i]);
            $this->assertTrue(count($result['documents']) > 0);
        }
        # delete tasks
        $apiInstance->deleteTasks($taskIds);
        $info = $apiInstance->getTasksInfo($taskIds);
        $this->assertTrue(empty($info->getTasks()));
    }
}
