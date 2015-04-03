<?php

/**
 * This class provides methods to get credentials and security datas used by our API.
 */
class SecurityData {
    /**
     * The prefix of environment variables containing security information
     * @var string
     */
    const ENV_PREFIX = 'CREDENTIAL_';

    /**
     * Name of the secret name containing the name of the files to store other secrets
     * @var string
     */
    const SECRET_FILE = 'path.datasources.securitydata';

    /**
     * Gets a specified secret
     *
     * @param string $secretName the secret's name
     * @return string the secret value
     *
     */
    public static function getSecret ($secretName) {
        $methods = [ 'getSecretFromEnvironment', 'getSecretFromFile' ];
        foreach ($methods as $method) {
            $secretValue = static::$method($secretName);
            if ($secretValue !== "") {
                return $secretValue;
            }
        }

        return "";
    }


    /**
     * Gets a specified secret from environment
     *
     * @param string $secretName the secret's name
     * @return string the secret value
     *
     */
    public static function getSecretFromFile ($secretName) {
        $file = static::getSecretFilePath();
        if (file_exists($file)) {
            $data = file_get_contents($file);
            $bagOfSecrets = json_decode($data);
            if ($bagOfSecrets && is_object($bagOfSecrets) && property_exists($bagOfSecrets, $secretName)) {
                return $bagOfSecrets->$secretName;
            }
        }
        return "";
    }

    /**
     * Gets secret file path
     *
     * @return string the path to the file containing secrets
     */
    public static function getSecretFilePath () {
        return static::getSecretFromEnvironment(static::SECRET_FILE);
    }

    /**
     * Gets a specified secret from environment
     *
     * @param string $secretName the secret's name
     * @return string the secret value
     *
     */
    public static function getSecretFromObject ($object, $secretName) {
        if (property_exists($object, $secretName)) {
            return $object->$secretName;
        }
        return "";
    }

    /**
     * Gets a specified secret from environment
     *
     * @param string $secretName the secret's name
     * @return string the secret value
     *
     */
    public static function getSecretFromEnvironment ($secretName) {
        $environmentVariable = static::getEnvironmentVariableName($secretName);
        $secretValue = getenv($environmentVariable);
        if ($secretValue === false) {
            return "";
        }
        return $secretValue;
    }

    /**
     * Gets environment variable name from secret name
     *
     * @param string $secretName the secret's name
     * @return string the environment variable
     */
    public static function getEnvironmentVariableName ($secretName) {
        $variableName = str_replace('.', '_', $secretName);
        return static::ENV_PREFIX . strtoupper($variableName);
    }
}
