# TokensResponseTokens

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**word** | **string** | Word as in text | [optional] 
**lemma** | **string** | A dictionary form of a word, e.g. given verb forms \&quot;run\&quot;, \&quot;ran\&quot; and \&quot;runs\&quot;, \&quot;run\&quot; is the lemma | [optional] 
**part_of_speech** | **string** | Assigns a word to a morphological category according to each syntactic functions. | [optional] 
**modifier** | [**object**](.md) | One of the grammatical categories of a word, e.g. person for verbs or number for nouns. Each part of speech has its own set of modifiers.  The detailed list of parameters can be found in Help to TM API Server. | [optional] 
**is_extension** | **int** | Indicates a way of writing a token with the previous one. It returns \&quot;1\&quot;, if tokens are written as a single token. It returns \&quot;0\&quot;, if tokens are written separately. | [optional] 
**position** | [**\TmApi\Model\TokensResponsePosition**](TokensResponsePosition.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


