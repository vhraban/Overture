# Overture

Overture is a universal PHP configuration tool. Traditionally frameworks tell us how and where to store our configuration data and it is not always easy to overrride default behaviour. Overture provides a common interface to retrieve configuration values regardless of where they stored, let it be a YML file in a project folder or a key stored in Consul.io.

This approach allows configuration source to be easily swapped. Consider having common AWS credentials and Elastic Search node details in one centralized location. Whenever the value of such configuration option changes, every project using Overture will use new values straight away. What if you application becomes a little bit special and needs an solated configuration? No problem, just swap the provider and nothing else in your code would need to change.

```
$provider = new ConsulIOProvder($baseURL);
$overture = new Overture($provider);
$AWSSecret = $overture->get('aws.secret');
```

If the application scales and does not want to share configuration values anymore, we can always change the provider

```
$provider = new YamlProvider($configFile);
$overture = new Overture($provider);
$AWSSecret = $overture->get('aws.secret');
```