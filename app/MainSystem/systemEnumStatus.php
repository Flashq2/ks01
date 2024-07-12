<?php
namespace App\MainSystem;
enum systemEnumStatus:string{
    case SaveSuccess = "Record Successful Save to system";
    case SaveFaild = "Save faild";
    case Update = "Record Successful update" ;
    case Delete = 'Recorod already delete from system' ;
    case Error = 'Something went wrong, Please contact your service provider';
    case DeniedAccess = 'You don`t have permission to access this page or function';
    case DeniedUpdate = 'You don`t have permission to update this function' ; 
    case Notfound = 'Record Not found' ;
}