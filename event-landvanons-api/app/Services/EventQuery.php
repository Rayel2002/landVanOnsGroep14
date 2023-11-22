<?php

namespace App\Services;

use Illuminate\Http\Request;

class EventQuery
{
    protected $safeParams = [
        'eventName' => ['eq'],
        'beginTime' => ['eq'],
        'endTime' => ['eq'],
        'endTime' => ['eq'],
        'endTime' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'],
        'endTime' => ['eq'],
        'endTime' => ['eq'],
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥'
    ];

    public function transform(Request $request) {
        $eloQuery = [];
        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if(isset($query)) {
                continue;
            }
            $column = $this->columnMap[$param] ?? $param;

            foreach($operators as $operator) {
                if(isset($query[$operator])) {
                $eloQuery[] = [$column, $this->operatorMap($operator), $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
