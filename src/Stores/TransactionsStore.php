<?php

namespace PhilKra\Stores;

use PhilKra\Events\Transaction;

/**
 *
 * Store for the Transaction Events
 *
 */
class TransactionsStore extends Store
{
    /**
     * Register a Transaction
     *
     * @param \PhilKra\Events\Transaction $transaction
     *
     * @return void
     */
    public function register(Transaction $transaction)
    {
        // Push to Store
        $this->store[] = $transaction;
    }

    /**
     * Fetch a Transaction from the Store
     *
     * @param string $name
     *
     * @return mixed: \PhilKra\Events\Transaction | null
     */
    public function fetch(string $name)
    {
        /** @var Transaction $transaction */
        foreach ($this->store as $transaction) {
            if ($transaction->getTransactionName() === $name) {
                return $transaction;
            }
        }

        return null;
    }

    /**
     * Serialize the Transactions Events Store
     *
     * @return array
     */
    public function jsonSerialize() : array
    {
        return array_values($this->store);
    }
}
