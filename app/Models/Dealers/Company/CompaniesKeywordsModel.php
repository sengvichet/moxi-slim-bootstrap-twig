<?php
/**
 * This file contains CompaniesKeywordsModel.
 *
 * PHP version 7.1
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  GIT:
 * @link     http://lamp-dev.com
 */
namespace App\Models\Dealers\Company;

use Illuminate\Database\Capsule\Manager;

class CompaniesKeywordsModel
{
    protected $tableName = 'companies_keywords';
    protected $fields = ['company_id', 'keyword'];
    /**
     * DB table object
     *
     * @var \Illuminate\Database\Query\Builder
     */
    private $table;
    /**
     * Logger instance
     *
     * @var \Monolog\Logger
     */
    private $logger;

    /**
     * Initialises query builder.
     *
     * @param Manager $dbService DB service
     * @param Logger  $logger    logger service
     *
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Fetches company's keywords
     *
     * @param int $companyId company ID
     *
     * @return int|bool
     */
    public function getCompanyKeywords(int $companyId)
    {
        if (!$companyId) {
            return false;
        }
        try {
            return $this->table->where('company_id', $companyId)->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Deletes company's keywords
     *
     * @param int $companyId company ID
     *
     * @return int|bool
     */
    public function deleteCompanyKeywords(int $companyId)
    {
        if (!$companyId) {
            return false;
        }
        try {
            return $this->table->where('company_id', $companyId)->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts company's keyword
     *
     * @param array $data keyword data
     *
     * @return bool
     */
    public function insertCompanyKeyword(array $data)
    {
        if (!$data) {
            return false;
        }
        $insertData = [];
        foreach ($this->fields as $field) {
            if (!array_key_exists($field, $data)) {
                return false;
            }
            $insertData[$field] = $data[$field];
        }
        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
