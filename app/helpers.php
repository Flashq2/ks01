<?php

use Carbon\Carbon;

function encryptHelper($string)
{
     $encrypted_string = openssl_encrypt($string, 'AES-128-ECB', "per_hast_Cehck");
     return $encrypted_string;
}

function decryptHelper($string)
{ // Decrypt 
     $table_id_2 = str_replace(' ', '+', $string);
     $decrypted_string = openssl_decrypt($table_id_2, 'AES-128-ECB', "per_hast_Cehck");
     return $decrypted_string;
}

function createHeaderTitle($string)
{ // This function use for replace specail charactor to space 
     $clear_spc = str_replace('_', ' ', $string);
     $new_string = ucfirst($clear_spc);
     return $new_string;
}
function CountNotifi()
{
     $count =  App\Models\NotificationModel::where('is_read', 'no')->count();
     return $count;
}

function removeDataSpace($value)
{
     $value = trim($value);
     return $value;
}

function format_number($number, $format = "amount")
{

     $result = $number;
     if ($format != 'date' && $format != 'datetime') {
          $number = (float)str_replace(',', '', $number);
     }
     if ($number == 0) return '';
     switch (strtolower($format)) {
          case 'quantity':
               $result = number_format($number, 2);
               break;
          case 'amount':
               $result = number_format($number, 2, '.', ',');
               break;

          case 'date':
               if ($number) {
                    if ($number == '1900-01-01' || $number == '2500-01-01' || $number == '2900-01-01') {
                         return '';
                    } else {
                         return Carbon::parse($number)->format('d-M-Y');
                    }
               } else {
                    return '';
               }
               break;
          case 'datetime':
               if ($number) {
                    if ($number == '1900-01-01 00:00:00' || $number == '2500-01-01 00:00:00') {
                         return '';
                    } else {
                         return Carbon::parse($number)->format('d-M-Y h:i:s');
                    }
               } else {
                    return '';
               }
               break;

          default:

               break;
     }
     return $result;
}
