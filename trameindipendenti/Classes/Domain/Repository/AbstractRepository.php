<?php
/**
 * Created by PhpStorm.
 * User: abramotesoro
 * Date: 01/02/2022
 * Time: 11.14
 */

namespace Tra\Trameindipendenti\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
class AbstractRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findConstantsSysTemplate()
    {
        $vettConstantsSysTemplate = [];
        $conn = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('sys_template');
        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder->getRestrictions();
        $valueConstantsSysTemplate = $queryBuilder
            ->select('constants')
            ->from('sys_template')
            ->add('where', 'root = 1')
            ->execute()
            ->fetchAll();
        if (!empty($valueConstantsSysTemplate[0]['constants'])){
            $vettConstants = preg_split('/\n|\r\n?/',$valueConstantsSysTemplate[0]['constants']);
            /*costruire il vettore del campo constants della tabella sys_template*/
            for ($i = 0; $i < count($vettConstants); $i++){
                 $idx = stripos($vettConstants[$i], '=');
                 $constantsIdx = substr($vettConstants[$i],0,$idx);
                 $constantsValue = substr($vettConstants[$i],$idx+1);
                $vettConstantsSysTemplate[trim($constantsIdx)]= trim($constantsValue);
            }
            return $vettConstantsSysTemplate;
        }

        return $vettConstantsSysTemplate;
    }

    public function updateCostantsSysTemplate($valueConstants){

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_template');
        $queryBuilder
            ->update('sys_template')
            ->where('root = 1')
            ->set('constants', $valueConstants)
            ->execute();
    }



}