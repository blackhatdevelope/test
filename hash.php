<?php
 class Hash{

  public  function encryptPass($password) {
         $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
         $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
         $method = 'aes-256-cbc';

         $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

         $encrypted = base64_encode(openssl_encrypt($password, $method, $sSalt, OPENSSL_RAW_DATA, $iv));
         return $encrypted;
     }

  public  function decryptPass($password) {
         $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
         $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
         $method = 'aes-256-cbc';

         $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

         $decrypted = openssl_decrypt(base64_decode($password), $method, $sSalt, OPENSSL_RAW_DATA, $iv);
         return $decrypted;
     }
 }