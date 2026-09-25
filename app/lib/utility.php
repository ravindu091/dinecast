<?php


function getRemainingDays(string $expiryDate){
    $expiry = DateTimeImmutable::createFromFormat('d/m/Y',$expiryDate);
    $today = new DateTimeImmutable('today');
    if($expiry === false){
        return 0;
    }
    return $today->diff($expiry)->format('%r%a');

}

function getStatusClass(int $remainingDays){
    if($remainingDays < 1){
        return [
            'text'=>'Expired',
            'class'=>'bg-red'
        ];
    }else if($remainingDays < 10){
        return [
            'text'=>'Expire Soon',
            'class'=>'bg-orange'
        ];
    }else{
        return [
            'text'=>'good',
            'class'=>'bg-green'
        ];
    }

}