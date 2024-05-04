<?php

if (!function_exists('checkStatus')) {
    function checkStatus(?Response $response)
    {
        if (is_object($response)) {
            // Eğer bir nesne ise isSuccess() yöntemini çağırarak başarı durumunu kontrol et
            return $response->isSuccess();
        }

        // Eğer $response bir dize ise başarı durumu false olarak kabul edilir
        // İhtiyaca göre burayı özelleştirebilirsiniz
        return false;
    }
}
