<?php

/**
 * Created by PhpStorm.
 * User: abramotesoro
 * Date: 01/02/2022
 * Time: 12:21
 */

namespace Tra\Trameindipendenti\Controller;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Extbase\Annotation as Extbase;
class ModuleConfController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * abstractRepository
	 *
	 * @Extbase\Inject
	 * @var \Tra\Trameindipendenti\Domain\Repository\AbstractRepository
	 *
	 */
	protected $abstractRepository = NULL;

	public function indexAction(){}

	public function saveAction(){}

}