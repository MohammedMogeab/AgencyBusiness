<?php
namespace core;
use core\App;
use core\Database;


class Investment {
    public static function create($userId, $amount) {
        $db = App::resolve(Database::class);
         

        $stmt = $db->query("INSERT INTO investments (user_id, amount, status, created_at) VALUES (:user_id, :amount, :status, NOW())", ['user_id' => $userId, 'amount' => $amount, 'status' => 'pending']);

    }

    public static function markAsCompleted($userId, $amount, $transactionId) {
          $db = App::resolve(Database::class);
         
        $stmt = $db->query("UPDATE investments SET status='completed', transaction_id=:transaction_id, updated_at=NOW() WHERE user_id=:user_id AND amount=:amount AND status='pending'", ['user_id' => $userId, 'amount' => $amount, 'transaction_id' => $transactionId]);
       
    }
}
