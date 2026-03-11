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

	public function salvaSocialAction(){
		$vettConstantsSysTemplate = $this->abstractRepository->findConstantsSysTemplate();
		/*controllo i parametri che posso inseriti o modificati nella finestra Page
		 * facebook
		 * twitter
		 * instagram
		 * youtube
		 * vimeo
		 * linkedin
		 **/
		if ($this->request->hasArgument('facebook')) {
			$facebook = trim($this->request->getArgument('facebook'));
			if ($facebook !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['facebook'])){
					if ($vettConstantsSysTemplate['facebook'] != $facebook)
						$vettConstantsSysTemplate['facebook']  = $facebook;
				}else{
					$vettConstantsSysTemplate['facebook'] = $facebook;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['facebook']);
			}
		}
		if ($this->request->hasArgument('twitter')) {
			$twitter = trim($this->request->getArgument('twitter'));
			if ($twitter !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['twitter'])){
					if ($vettConstantsSysTemplate['twitter'] != $twitter)
						$vettConstantsSysTemplate['twitter']  = $twitter;
				}else{
					$vettConstantsSysTemplate['twitter'] = $twitter;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['twitter']);
			}
		}
		if ($this->request->hasArgument('instagram')) {
			$instagram = trim($this->request->getArgument('instagram'));
			if ($instagram !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['instagram'])){
					if ($vettConstantsSysTemplate['instagram'] != $instagram)
						$vettConstantsSysTemplate['instagram']  = $instagram;
				}else{
					$vettConstantsSysTemplate['instagram'] = $instagram;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['instagram']);
			}
		}
		if ($this->request->hasArgument('youtube')) {
			$youtube = trim($this->request->getArgument('youtube'));
			if ($youtube !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['youtube'])){
					if ($vettConstantsSysTemplate['youtube'] != $youtube)
						$vettConstantsSysTemplate['youtube']  = $youtube;
				}else{
					$vettConstantsSysTemplate['youtube'] = $youtube;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['youtube']);
			}
		}
		if ($this->request->hasArgument('vimeo')) {
			$vimeo = trim($this->request->getArgument('vimeo'));
			if ($vimeo !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['vimeo'])){
					if ($vettConstantsSysTemplate['vimeo'] != $vimeo)
						$vettConstantsSysTemplate['vimeo']  = $vimeo;
				}else{
					$vettConstantsSysTemplate['vimeo'] = $vimeo;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['vimeo']);
			}
		}
		if ($this->request->hasArgument('linkedin')) {
			$linkedin = trim($this->request->getArgument('linkedin'));
			if ($linkedin !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['linkedin'])){
					if ($vettConstantsSysTemplate['linkedin'] != $linkedin)
						$vettConstantsSysTemplate['linkedin']  = $linkedin;
				}else{
					$vettConstantsSysTemplate['linkedin'] = $linkedin;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['linkedin']);
			}
		}

		$contConstants = '';
		foreach($vettConstantsSysTemplate as $key=>$values){
			$sigleConstants = $key. ' = '.$values.chr(13).chr(10);
			$contConstants .= $sigleConstants;
		}
		$contConstants = substr_replace($contConstants,'',strrpos($contConstants,chr(13).chr(10)));
		$this->abstractRepository->updateCostantsSysTemplate($contConstants);
		$this->redirect('page', 'ModuleConf', $this->extensionName);
	}

	public function salvaPageAction(){
		$vettConstantsSysTemplate = $this->abstractRepository->findConstantsSysTemplate();
		/*controllo i parametri che posso inseriti o modificati nella finestra Page
		 * id_giuria
		 * id_finalisti
		 * id_archivio_news
		 * id_privacy
		 * id_note_legali
		 * id_mappa
		 * id_credits
		 * id_search
		 **/
		if ($this->request->hasArgument('id_giuria')) {
			$id_giuria = trim($this->request->getArgument('id_giuria'));
			if ($id_giuria !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_giuria'])){
					if ($vettConstantsSysTemplate['id_giuria'] != $id_giuria)
						$vettConstantsSysTemplate['id_giuria']  = $id_giuria;
				}else{
					$vettConstantsSysTemplate['id_giuria'] = $id_giuria;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_giuria']);
			}
		}
		if ($this->request->hasArgument('id_finalisti')) {
			$id_finalisti = trim($this->request->getArgument('id_finalisti'));
			if ($id_finalisti !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_finalisti'])){
					if ($vettConstantsSysTemplate['id_finalisti'] != $id_finalisti)
						$vettConstantsSysTemplate['id_finalisti']  = $id_finalisti;
				}else{
					$vettConstantsSysTemplate['id_finalisti'] = $id_finalisti;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_finalisti']);
			}
		}
		if ($this->request->hasArgument('id_archivio_news')) {
			$id_archivio_news = trim($this->request->getArgument('id_archivio_news'));
			if ($id_archivio_news !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_archivio_news'])){
					if ($vettConstantsSysTemplate['id_archivio_news'] != $id_archivio_news)
						$vettConstantsSysTemplate['id_archivio_news']  = $id_archivio_news;
				}else{
					$vettConstantsSysTemplate['id_archivio_news'] = $id_archivio_news;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_archivio_news']);
			}
		}
		if ($this->request->hasArgument('id_privacy')) {
			$id_privacy = trim($this->request->getArgument('id_privacy'));
			if ($id_privacy !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_privacy'])){
					if ($vettConstantsSysTemplate['id_privacy'] != $id_privacy)
						$vettConstantsSysTemplate['id_privacy']  = $id_privacy;
				}else{
					$vettConstantsSysTemplate['id_privacy'] = $id_privacy;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_privacy']);
			}
		}
		if ($this->request->hasArgument('id_note_legali')) {
			$id_note_legali = trim($this->request->getArgument('id_note_legali'));
			if ($id_note_legali !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_note_legali'])){
					if ($vettConstantsSysTemplate['id_note_legali'] != $id_note_legali)
						$vettConstantsSysTemplate['id_note_legali']  = $id_note_legali;
				}else{
					$vettConstantsSysTemplate['id_note_legali'] = $id_note_legali;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_note_legali']);
			}
		}
		if ($this->request->hasArgument('id_mappa')) {
			$id_mappa = trim($this->request->getArgument('id_mappa'));
			if ($id_mappa !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_mappa'])){
					if ($vettConstantsSysTemplate['id_mappa'] != $id_mappa)
						$vettConstantsSysTemplate['id_mappa']  = $id_mappa;
				}else{
					$vettConstantsSysTemplate['id_mappa'] = $id_mappa;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_mappa']);
			}
		}
		if ($this->request->hasArgument('id_credits')) {
			$id_credits = trim($this->request->getArgument('id_credits'));
			if ($id_credits !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_credits'])){
					if ($vettConstantsSysTemplate['id_credits'] != $id_credits)
						$vettConstantsSysTemplate['id_credits']  = $id_credits;
				}else{
					$vettConstantsSysTemplate['id_credits'] = $id_credits;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_credits']);
			}
		}
		if ($this->request->hasArgument('id_search')) {
			$id_search = trim($this->request->getArgument('id_search'));
			if ($id_search !== ''){
				/*controllo che questo paramentro è presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_search'])){
					if ($vettConstantsSysTemplate['id_search'] != $id_search)
						$vettConstantsSysTemplate['id_search']  = $id_search;
				}else{
					$vettConstantsSysTemplate['id_search'] = $id_search;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_search']);
			}
		}
		$contConstants = '';
		foreach($vettConstantsSysTemplate as $key=>$values){
			$sigleConstants = $key. ' = '.$values.chr(13).chr(10);
			$contConstants .= $sigleConstants;
		}
		$contConstants = substr_replace($contConstants,'',strrpos($contConstants,chr(13).chr(10)));
		$this->abstractRepository->updateCostantsSysTemplate($contConstants);
		$this->redirect('index', 'ModuleConf', $this->extensionName);
	}

	public function salvaContainerAction(){
		$vettConstantsSysTemplate = $this->abstractRepository->findConstantsSysTemplate();
		/*controllo i parametri che posso inseriti o modificati nella finestra Container
		 * id_newsfolder
		 * id_userfolder
		 * id_clientfolder
		 **/
		if ($this->request->hasArgument('id_newsfolder')) {
			$id_newsfolder = trim($this->request->getArgument('id_newsfolder'));
			if ($id_newsfolder !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_newsfolder'])){
					if ($vettConstantsSysTemplate['id_newsfolder'] != $id_newsfolder)
						$vettConstantsSysTemplate['id_newsfolder']  = $id_newsfolder;
				}else{
					$vettConstantsSysTemplate['id_newsfolder'] = $id_newsfolder;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_newsfolder']);
			}
		}
		if ($this->request->hasArgument('id_userfolder')) {
			$id_userfolder = trim($this->request->getArgument('id_userfolder'));
			if ($id_userfolder !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_userfolder'])){
					if ($vettConstantsSysTemplate['id_userfolder'] != $id_userfolder)
						$vettConstantsSysTemplate['id_userfolder']  = $id_userfolder;
				}else{
					$vettConstantsSysTemplate['id_userfolder'] = $id_userfolder;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_userfolder']);
			}
		}
		if ($this->request->hasArgument('id_clientfolder')) {
			$id_clientfolder = trim($this->request->getArgument('id_clientfolder'));
			if ($id_clientfolder !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['id_clientfolder'])){
					if ($vettConstantsSysTemplate['id_clientfolder'] != $id_clientfolder)
						$vettConstantsSysTemplate['id_clientfolder']  = $id_clientfolder;
				}else{
					$vettConstantsSysTemplate['id_clientfolder'] = $id_clientfolder;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['id_clientfolder']);
			}
		}
		$contConstants = '';
		foreach($vettConstantsSysTemplate as $key=>$values){
			$sigleConstants = $key. ' = '.$values.chr(13).chr(10);
			$contConstants .= $sigleConstants;
		}
		$contConstants = substr_replace($contConstants,'',strrpos($contConstants,chr(13).chr(10)));
		$this->abstractRepository->updateCostantsSysTemplate($contConstants);
		$this->redirect('index', 'ModuleConf', $this->extensionName);
	}

	public function salvaContattiAction(){
		$vettConstantsSysTemplate = $this->abstractRepository->findConstantsSysTemplate();
		/*controllo i parametri che posso inseriti o modificati nella finestra Page
		 * email
		 * pec
		 * tel
		 * fax
		 **/
		if ($this->request->hasArgument('email')) {
			$email = trim($this->request->getArgument('email'));
			if ($email !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['email'])){
					if ($vettConstantsSysTemplate['email'] != $email)
						$vettConstantsSysTemplate['email']  = $email;
				}else{
					$vettConstantsSysTemplate['email'] = $email;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['email']);
			}
		}
		if ($this->request->hasArgument('pec')) {
			$pec = trim($this->request->getArgument('pec'));
			if ($pec !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['pec'])){
					if ($vettConstantsSysTemplate['pec'] != $pec)
						$vettConstantsSysTemplate['pec']  = $pec;
				}else{
					$vettConstantsSysTemplate['pec'] = $pec;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['pec']);
			}
		}
		if ($this->request->hasArgument('tel')) {
			$tel = trim($this->request->getArgument('tel'));
			if ($tel !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['tel'])){
					if ($vettConstantsSysTemplate['tel'] != $tel)
						$vettConstantsSysTemplate['tel']  = $tel;
				}else{
					$vettConstantsSysTemplate['tel'] = $tel;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['tel']);
			}
		}
		if ($this->request->hasArgument('fax')) {
			$fax = trim($this->request->getArgument('fax'));
			if ($fax !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['fax'])){
					if ($vettConstantsSysTemplate['fax'] != $fax)
						$vettConstantsSysTemplate['fax']  = $fax;
				}else{
					$vettConstantsSysTemplate['fax'] = $fax;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['fax']);
			}
		}
		$contConstants = '';
		foreach($vettConstantsSysTemplate as $key=>$values){
			$sigleConstants = $key. ' = '.$values.chr(13).chr(10);
			$contConstants .= $sigleConstants;
		}
		$contConstants = substr_replace($contConstants,'',strrpos($contConstants,chr(13).chr(10)));
		$this->abstractRepository->updateCostantsSysTemplate($contConstants);
		$this->redirect('index', 'ModuleConf', $this->extensionName);
	}

	public function salvaCopyrightAction(){
		$vettConstantsSysTemplate = $this->abstractRepository->findConstantsSysTemplate();
		/*controllo i parametri che posso inseriti o modificati nella finestra Page
		 * copyright
		 * credits
		 **/
		if ($this->request->hasArgument('copyright')) {
			$copyright = trim($this->request->getArgument('copyright'));
			if ($copyright !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['copyright'])){
					if ($vettConstantsSysTemplate['copyright'] != $copyright)
						$vettConstantsSysTemplate['copyright']  = $copyright;
				}else{
					$vettConstantsSysTemplate['copyright'] = $copyright;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['copyright']);
			}
		}
		if ($this->request->hasArgument('credits')) {
			$credits = trim($this->request->getArgument('credits'));
			if ($credits !== ''){
				/*controllo che questo paramentro è  presente nel vettore costruito con le costanti di systemplate*/
				if (isset($vettConstantsSysTemplate['credits'])){
					if ($vettConstantsSysTemplate['credits'] != $credits)
						$vettConstantsSysTemplate['credits']  = $credits;
				}else{
					$vettConstantsSysTemplate['credits'] = $credits;
				}
			}else{
				/*eliminare il valore dal vettore valorizzato dal campo constants di sys_template*/
				unset($vettConstantsSysTemplate['credits']);
			}
		}
		$contConstants = '';
		foreach($vettConstantsSysTemplate as $key=>$values){
			$sigleConstants = $key. ' = '.$values.chr(13).chr(10);
			$contConstants .= $sigleConstants;
		}
		$contConstants = substr_replace($contConstants,'',strrpos($contConstants,chr(13).chr(10)));
		$this->abstractRepository->updateCostantsSysTemplate($contConstants);
		$this->redirect('index', 'ModuleConf', $this->extensionName);
	}

}