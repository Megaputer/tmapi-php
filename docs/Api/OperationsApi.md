# TmApi\OperationsApi

All URIs are relative to *https://localhost:7008/tmapi/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**extractDocumentsEntities**](OperationsApi.md#extractDocumentsEntities) | **POST** /operations/entities | Entities extraction
[**extractDocumentsFacts**](OperationsApi.md#extractDocumentsFacts) | **POST** /operations/facts | Facts extraction
[**extractDocumentsKeywords**](OperationsApi.md#extractDocumentsKeywords) | **POST** /operations/keywords | Keywords extraction
[**extractDocumentsSentiments**](OperationsApi.md#extractDocumentsSentiments) | **POST** /operations/sentiments | Sentiments analysis
[**extractDocumentsTokens**](OperationsApi.md#extractDocumentsTokens) | **POST** /operations/tokens | Text parsing
[**extractEntities**](OperationsApi.md#extractEntities) | **GET** /operations/entities | Entities extraction
[**extractFacts**](OperationsApi.md#extractFacts) | **GET** /operations/facts | Facts extraction
[**extractKeywords**](OperationsApi.md#extractKeywords) | **GET** /operations/keywords | Keywords extraction
[**extractSentiments**](OperationsApi.md#extractSentiments) | **GET** /operations/sentiments | Sentiments analysis
[**extractTokens**](OperationsApi.md#extractTokens) | **GET** /operations/tokens | Text parsing
[**getDocumentsLanguages**](OperationsApi.md#getDocumentsLanguages) | **POST** /operations/languages | Language detection
[**getLanguages**](OperationsApi.md#getLanguages) | **GET** /operations/languages | Language detection


# **extractDocumentsEntities**
> \TmApi\Model\EntitiesResponse extractDocumentsEntities($documents, $positions)

Entities extraction

The operation extracts entities from each file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$documents = {"files":[{"content":"RWx2aXMgUHJlc2xleSB3YXMgYm9ybiBpbiBUdXBlbG8sIE1pc3Npc3NpcHBp","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractDocumentsEntities($documents, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractDocumentsEntities: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\EntitiesResponse**](../Model/EntitiesResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractDocumentsFacts**
> \TmApi\Model\FactsResponse extractDocumentsFacts($documents, $positions)

Facts extraction

The operation extracts facts from each file. The term \"fact\" is used to denote phenomena, events, notions and relations between them which may be of interest to users.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$documents = {"files":[{"content":"RWx2aXMgUHJlc2xleSB3YXMgYW4gQW1lcmljYW4gc2luZ2Vy","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractDocumentsFacts($documents, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractDocumentsFacts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\FactsResponse**](../Model/FactsResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractDocumentsKeywords**
> \TmApi\Model\KeywordsResponse extractDocumentsKeywords($documents, $positions)

Keywords extraction

The operation explores often mentioned terms in each file. The response returns keywords and other statistics extracted from each file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$documents = {"files":[{"content":"VGhlIFNlbmF0ZSBBZ3JpY3VsdHVyZSBDb21taXR0ZWUgd2FzIGV4cGVjdGVkIHRvIGNvbnNpZGVyIHByb3Bvc2FscyB0aGF0IHdvdWxkIGxpbWl0IGFkanVzdG1lbnRzIGluIGNvdW50eSBsb2FuIHJhdGUgZGlmZmVyZW50aWFscyB3aGljaCB0cmlnZ2VyIGxhcmdlciBjb3JuIGFuZCB3aGVhdCBhY3JlYWdlIHJlZHVjdGlvbiByZXF1aXJlbWVudHMu","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractDocumentsKeywords($documents, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractDocumentsKeywords: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\KeywordsResponse**](../Model/KeywordsResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractDocumentsSentiments**
> \TmApi\Model\SentimentsResponse extractDocumentsSentiments($documents, $positions)

Sentiments analysis

The operation extracts opinions and emotions related to something, identifies the subject, the object of evaluation and the evaluation itself in each file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$documents = {"files":[{"content":"VGhlIGJ1cmdlciB3YXMgZ3JlYXQsIGJ1dCB0aGUgd2FpdGVyIHdhcyB2ZXJ5IHJ1ZGUu","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractDocumentsSentiments($documents, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractDocumentsSentiments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\SentimentsResponse**](../Model/SentimentsResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractDocumentsTokens**
> \TmApi\Model\TokensResponse extractDocumentsTokens($documents)

Text parsing

Parse text in each file. The response returns the text which is divided into tokens and sentences, conducts morphological analysis, determines parts of speech, lemmas, etc.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$documents = {"files":[{"content":"RWx2aXMgUHJlc2xleSB3YXMgYm9ybiBpbiBUdXBlbG8sIE1pc3Npc3NpcHBp","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process

try {
    $result = $apiInstance->extractDocumentsTokens($documents);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractDocumentsTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |

### Return type

[**\TmApi\Model\TokensResponse**](../Model/TokensResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractEntities**
> \TmApi\Model\EntitiesResponse extractEntities($text, $positions)

Entities extraction

The operation extracts entities from the text document. For example, an entity may represent a person’s name, a name of an organization, an e-mail address, a phone number, or a geographical location.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$text = "Elvis Presley was born in Tupelo, Mississippi"; // string | Document text to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractEntities($text, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractEntities: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **text** | **string**| Document text to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\EntitiesResponse**](../Model/EntitiesResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractFacts**
> \TmApi\Model\FactsResponse extractFacts($text, $positions)

Facts extraction

The operation extracts facts from the text. The term \"fact\" is used to denote phenomena, events, notions and relations between them which may be of interest to users.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$text = "Elvis Presley was an American singer"; // string | Document text to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractFacts($text, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractFacts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **text** | **string**| Document text to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\FactsResponse**](../Model/FactsResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractKeywords**
> \TmApi\Model\KeywordsResponse extractKeywords($text, $positions)

Keywords extraction

The operation explores often mentioned terms in the text. The response returns keywords and other statistics extracted from the text.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$text = "The Senate Agriculture Committee was expected to consider proposals that would limit adjustments in county loan rate differentials which trigger larger corn and wheat acreage reduction requirements."; // string | Document text to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractKeywords($text, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractKeywords: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **text** | **string**| Document text to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\KeywordsResponse**](../Model/KeywordsResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractSentiments**
> \TmApi\Model\SentimentsResponse extractSentiments($text, $positions)

Sentiments analysis

Extract sentiments from document

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$text = "The burger was great, but the waiter was very rude."; // string | Document text to process
$positions = "none"; // string | Positions format to be returned from server: - `none` - Don't return positions (**default**) - `symbol` - Symbol positions - `token` - Token positions

try {
    $result = $apiInstance->extractSentiments($text, $positions);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractSentiments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **text** | **string**| Document text to process |
 **positions** | **string**| Positions format to be returned from server: - &#x60;none&#x60; - Don&#39;t return positions (**default**) - &#x60;symbol&#x60; - Symbol positions - &#x60;token&#x60; - Token positions | [optional]

### Return type

[**\TmApi\Model\SentimentsResponse**](../Model/SentimentsResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **extractTokens**
> \TmApi\Model\TokensResponse extractTokens($text)

Text parsing

Parse document text. The response returns the text which is divided into tokens and sentences, conducts morphological analysis, determines parts of speech, lemmas, etc.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$text = "Elvis Presley was born in Tupelo, Mississippi"; // string | Document text to process

try {
    $result = $apiInstance->extractTokens($text);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->extractTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **text** | **string**| Document text to process |

### Return type

[**\TmApi\Model\TokensResponse**](../Model/TokensResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getDocumentsLanguages**
> \TmApi\Model\LanguagesResponse getDocumentsLanguages($documents)

Language detection

Automatically determine the language of each file.  The text encoding format of source files with the .txt extension must be strictly UTF-8. Otherwise, requests will not be executed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$documents = {"files":[{"content":"RWx2aXMgUHJlc2xleSB3YXMgYm9ybiBpbiBUdXBlbG8sIE1pc3Npc3NpcHBp","extension":"txt"}]}; // \TmApi\Model\Documents | Documents to process

try {
    $result = $apiInstance->getDocumentsLanguages($documents);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->getDocumentsLanguages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **documents** | [**\TmApi\Model\Documents**](../Model/Documents.md)| Documents to process |

### Return type

[**\TmApi\Model\LanguagesResponse**](../Model/LanguagesResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLanguages**
> \TmApi\Model\LanguagesResponse getLanguages($text)

Language detection

Detect the language of text documents

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: BasicAuth
$config = TmApi\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

$apiInstance = new TmApi\Api\OperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$text = "Elvis Presley was born in Tupelo, Mississippi"; // string | Document text to process

try {
    $result = $apiInstance->getLanguages($text);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperationsApi->getLanguages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **text** | **string**| Document text to process |

### Return type

[**\TmApi\Model\LanguagesResponse**](../Model/LanguagesResponse.md)

### Authorization

[BasicAuth](../../README.md#BasicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

