# TmApi\TasksApi

All URIs are relative to *https://localhost:7008/tmapi/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTask**](TasksApi.md#createTask) | **POST** /tasks | Create task
[**deleteTasks**](TasksApi.md#deleteTasks) | **DELETE** /tasks | Delete tasks
[**getTaskResult**](TasksApi.md#getTaskResult) | **GET** /tasks/result | Task result
[**getTasksInfo**](TasksApi.md#getTasksInfo) | **GET** /tasks | Tasks information


# **createTask**
> object createTask($operations, $documents, $async, $positions)

Create task

To create a task for performing several operations with text documents, specify required operations in the \"operations\" attribute in the request body. Tasks should be separated by a comma. The list of operations supported with the server could be retrieved via the request \"server\".  Created tasks are available to users until they are deleted by the DELETE method or the server is restarted. After restarting the server it is not possible to get information, to delete, or to get the result of the created tasks. The tasks will cease to exist as if they were deleted by the DELETE method.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\TasksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$operations = ["tokens"]; // string[] | List of operations (languages, tokens, keywords, entities, sentiments, facts)
$documents = {"files":[{"content":"VGhlIFNlbmF0ZSBBZ3JpY3VsdHVyZSBDb21taXR0ZWUgd2FzIGV4cGVjdGVkIHRvIGNvbnNpZGVyIHByb3Bvc2FscyB0aGF0IHdvdWxkIGxpbWl0IGFkanVzdG1lbnRzIGluIGNvdW50eSBsb2FuIHJhdGUgZGlmZmVyZW50aWFscyB3aGljaCB0cmlnZ2VyIGxhcmdlciBjb3JuIGFuZCB3aGVhdCBhY3JlYWdlIHJlZHVjdGlvbiByZXF1aXJlbWVudHMu","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process
$async = 1; // int | Asynchorous execution flag: * `0` - Block execution until result is ready (**default**) * `1` - Return GUID of newly created task and run task asynchronously
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->createTask($operations, $documents, $async, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TasksApi->createTask: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **operations** | [**string[]**](../Model/string.md)| List of operations (languages, tokens, keywords, entities, sentiments, facts) |
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |
 **async** | **int**| Asynchorous execution flag: * &#x60;0&#x60; - Block execution until result is ready (**default**) * &#x60;1&#x60; - Return GUID of newly created task and run task asynchronously | [optional]
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

**object**

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteTasks**
> object deleteTasks($ids)

Delete tasks

The operation allows to delete current user’s tasks specified in the ids parameter. Deleting tasks saves the server disk space.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\TasksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = ["FEFC8383-D7DB-4557-AFBA-D96CA9CD5808","14E115E2-BB0A-45E0-AACC-EC8600101031"]; // string[] | List of task identifiers

try {
    $result = $apiInstance->deleteTasks($ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TasksApi->deleteTasks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | [**string[]**](../Model/string.md)| List of task identifiers |

### Return type

**object**

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTaskResult**
> object getTaskResult($id, $operations, $positions)

Task result

The operation allows to get the result of the specified task. The task GUID and relevant operations are required.  Before getting results of the task execution, first ensure that the task is completed (the done paremeter is 100, the error parameter is empty).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\TasksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "FEFC8383-D7DB-4557-AFBA-D96CA9CD5808"; // string | Task identifier
$operations = ["tokens"]; // string[] | List of operations (languages, tokens, keywords, entities, sentiments, facts)
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->getTaskResult($id, $operations, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TasksApi->getTaskResult: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Task identifier |
 **operations** | [**string[]**](../Model/string.md)| List of operations (languages, tokens, keywords, entities, sentiments, facts) |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

**object**

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTasksInfo**
> \TmApi\Model\TaskInfo getTasksInfo($ids)

Tasks information

The operation allows to receive information about the specified tasks. A task unique identifier (GIUD) is required, which is returned when creating new asynchronous task. If the identifiers list is empty, the server will return information about all tasks of the current user.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\TasksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = ["FEFC8383-D7DB-4557-AFBA-D96CA9CD5808","14E115E2-BB0A-45E0-AACC-EC8600101031"]; // string[] | List of task identifiers

try {
    $result = $apiInstance->getTasksInfo($ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TasksApi->getTasksInfo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | [**string[]**](../Model/string.md)| List of task identifiers |

### Return type

[**\TmApi\Model\TaskInfo**](../Model/TaskInfo.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

