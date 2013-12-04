<?php
/**
 *  _  _  _ _______ ______  _______ _____ _______ _______
 *  |  |  | |______ |_____] |______   |      |    |______
 *  |__|__| |______ |_____] ______| __|__    |    |______
 *  ______  _______ _    _ _______         _____   _____   _____  _______ _______ _______ __   _ _______
 *  |     \ |______  \  /  |______ |      |     | |_____] |_____] |______ |  |  | |______ | \  |    |
 *  |_____/ |______   \/   |______ |_____ |_____| |       |       |______ | www.website-developpement.fr
 * -----------------------------------------------------------------------------------------------------
 *
 * Ce module à été développé par Prestaspirit.fr
 * Utilisation sous licence (incluse dans l'archive).
 * Prestaspirit.fr tout droits réservé.
 * http://www.prestaspirit.fr
 *
 * @author Pichard Franck - PrestaSpirit <contact@prestaspirit.fr>
 * @copyright  20010-2012 PrestaSpirit
 * @version 2.0
 *
 */

if (!defined('_PS_VERSION_'))
	exit;

class ChristmasDeco extends Module
{

	/** @var string HTML */
	public $_html;

	/****************************************************************************************/
	/** Construct Method ********************************************************************/
	/****************************************************************************************/

	/**
	 * __construct
	 *
	 * @access public
	 */
		public function __construct()
		{
			$this->name = "christmasdeco";
			$this->version = "2.0";
			$this->author = "Prestaspirit";
			$this->tab = 'front_office_features';
			$this->need_instance          = 1;
			$this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.6');
			
			parent::__construct();

			$this->displayName = $this->l('Christmas Deco');
			$this->description = $this->l('Add to your Christmas decoration shop');
			$this->confirmUninstall = $this->l('Are you sure you want to uninstall this module, all data will be lost?');
		}


	/****************************************************************************************/
	/** Install Methods *********************************************************************/
	/****************************************************************************************/

	/**
	 * install
	 *
	 * @access public
	 * @return bool
	 */
		public function install()
		{
			return (
				parent::install()
				&& $this->registerHook('displayHeader')
				&& $this->registerHook('displayTop')
				&& $this->registerHook('displayFooter')
				&& Configuration::updateValue("CHRISTMASDECO","1")
				&& Configuration::updateValue("CHRISTMASDECO_MODULO","1")
			);
		}


	/****************************************************************************************/
	/** Uninstall Methods *******************************************************************/
	/****************************************************************************************/

	/**
	 * uninstall
	 *
	 * @access public
	 * @return bool
	 */
		public function uninstall()
		{
			return (
				parent::uninstall()
				&& Configuration::deleteByName("CHRISTMASDECO")
				&& Configuration::deleteByName("CHRISTMASDECO_MODULO")
			);
		}


	/****************************************************************************************/
	/** _getMediaUri Method *****************************************************************/
	/****************************************************************************************/

	/**
	 * _getMediaUri
	 *
	 * @access private
	 * @return bool
	 */
		private function _getMediaUri($uri = '')
		{
			return Tools::getShopProtocol().Tools::getMediaServer($this->getPathUri().$uri).$this->getPathUri().$uri;
		}


	/****************************************************************************************/
	/** hookDisplayHeader Method ************************************************************/
	/****************************************************************************************/

	/**
	 * hookDisplayHeader
	 *
	 * @access public
	 */
		public function hookDisplayHeader()
		{
			if (!$this->active) return;

			$this->context->controller->addCSS($this->_getMediaUri('views/assets/css/style.css'), 'all');
		}


	/****************************************************************************************/
	/** hookDisplayHeader Method ************************************************************/
	/****************************************************************************************/

	/**
	 * hookDisplayHeader
	 *
	 * @access public
	 */
		public function hookDisplayTop($params)
		{
			if (!$this->active) return;

			if ( date('m')==12 && date('d') >= 01 && date('d') <= 26 )
			{
				if (Configuration::get("CHRISTMASDECO_MODULO"))
				{
					if(date('d')%2==0)
						$this->context->smarty->assign('deco', '1');
					else
						$this->context->smarty->assign('deco', '2');
				}
				else
					$this->context->smarty->assign('deco', Configuration::get("CHRISTMASDECO"));

				$this->context->smarty->assign('chrisyear', '1');
			}
			elseif( ( date('m')==12 && date('d')  >= 27 && date('d') <= 31 ) || ( date('m')==01 && date('d') <= 31 ) )
			{
				if (Configuration::get("CHRISTMASDECO_MODULO"))
				{
					if (date('d')%2==0)
						$this->context->smarty->assign('deco', '3');
					else
						$this->context->smarty->assign('deco', '4');
				}
				else
					$this->context->smarty->assign('deco', Configuration::get("CHRISTMASDECO"));

				$this->context->smarty->assign('chrisyear', '2');
			}

			$this->context->smarty->assign('mediaUri', $this->_getMediaUri());

			return $this->display(__FILE__, 'hookDisplayTop.tpl');
		}


	/****************************************************************************************/
	/** hookDisplayFooter Method ************************************************************/
	/****************************************************************************************/

	/**
	 * hookDisplayFooter
	 *
	 * @access public
	 */
		public function hookDisplayFooter($params)
		{
			if (!$this->active) return;

			if ( date('m')==12 && date('d') >= 01 && date('d') <= 26 )
			{
				if (Configuration::get("CHRISTMASDECO_MODULO"))
				{
					if(date('d')%2==0)
						$this->context->smarty->assign('deco', '1');
					else
						$this->context->smarty->assign('deco', '2');
				}
				else
					$this->context->smarty->assign('deco', Configuration::get("CHRISTMASDECO"));

				$this->context->smarty->assign('chrisyear', '1');
			}
			elseif( ( date('m')==12 && date('d')  >= 27 && date('d') <= 31 ) || ( date('m')==01 && date('d') <= 31 ) )
			{
				if (Configuration::get("CHRISTMASDECO_MODULO"))
				{
					if (date('d')%2==0)
						$this->context->smarty->assign('deco', '3');
					else
						$this->context->smarty->assign('deco', '4');
				}
				else
					$this->context->smarty->assign('deco', Configuration::get("CHRISTMASDECO"));

				$this->context->smarty->assign('chrisyear', '2');
			}

			$this->context->smarty->assign('mediaUri', $this->_getMediaUri());

			return $this->display(__FILE__, 'hookDisplayFooter.tpl');
		}


	/****************************************************************************************/
	/** _postProcess Method *****************************************************************/
	/****************************************************************************************/

	/**
	 * _postProcess
	 *
	 * @access private
	 */
		private function _postProcess()
		{
			$christmasdeco = Tools::getValue('christmasdeco', 1);
			$modulo = Tools::getValue('christmasdeco_modulo', 1);
			Configuration::updateValue('CHRISTMASDECO', $christmasdeco);
			if (Tools::getIsset('christmasdeco_modulo'))
				Configuration::updateValue('CHRISTMASDECO_MODULO', '1');
			else
				Configuration::updateValue('CHRISTMASDECO_MODULO', '0');

			$this->_html .= '<div class="conf confirm">'.$this->l('Updated')."</div>";
		}


	/****************************************************************************************/
	/** getContent Method *******************************************************************/
	/****************************************************************************************/

	/**
	 * getContent
	 *
	 * @access public
	 */
		public function getContent()
		{
			$this->_html .= "<h2>".$this->displayName."</h2>";
			
			if (Tools::isSubmit("submit"))
				$this->_postProcess();
			
			$this->_displayForm();
			
			return $this->_html;
		}


	/****************************************************************************************/
	/** _displayForm Method *****************************************************************/
	/****************************************************************************************/

	/**
	 * _displayForm
	 *
	 * @access private
	 */
		private function _displayForm()
		{
			global $currentIndex;
			
			$this->_html .= '
			<form action="'.$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'" method="post">
				
				<fieldset>
					<legend><img src="'.$this->getPathUri().'logo.gif" alt="" class="middle" />'.$this->l('Settings').'</legend>
					<label>'.$this->l('Variation jours pair/impaire').'</label>
					<div class="margin-form">
						<input type="checkbox" name="christmasdeco_modulo" value="1" '.((Configuration::get("CHRISTMASDECO_MODULO") == '1') ? 'checked="checked"' : '').' />
					</div>
					<br />
					<label>'.$this->l('Theme 1').'&nbsp;<input type="radio" name="christmasdeco" value="1" '.((Configuration::get("CHRISTMASDECO") == '1') ? 'checked="checked"' : '').' /></label>
					<div class="margin-form">
						<span><img src="'.$this->getPathUri().'views/assets/img/screen-1.png" style="border:1px solid #dddddd;padding:5px;margin-left:5px;" alt="'.$this->l('Theme 1').'"></span><br /><br />
					</div>
					<br />
					<label>'.$this->l('Theme 2').'&nbsp;<input type="radio" name="christmasdeco" value="2" '.((Configuration::get("CHRISTMASDECO") == '2') ? 'checked="checked"' : '').' /></label>
					<div class="margin-form">
						<span><img src="'.$this->getPathUri().'views/assets/img/screen-2.png" style="border:1px solid #dddddd;padding:5px;margin-left:5px;" alt="'.$this->l('Theme 2').'"></span><br /><br />
					</div>
					<br />
					<label>'.$this->l('Theme 3').'&nbsp;<input type="radio" name="christmasdeco" value="3" '.((Configuration::get("CHRISTMASDECO") == '3') ? 'checked="checked"' : '').' /></label>
					<div class="margin-form">
						<span><img src="'.$this->getPathUri().'views/assets/img/screen-3.png" style="border:1px solid #dddddd;padding:5px;margin-left:5px;" alt="'.$this->l('Theme 3').'"></span><br /><br />
					</div>
					<br />
					<label>'.$this->l('Theme 4').'&nbsp;<input type="radio" name="christmasdeco" value="4" '.((Configuration::get("CHRISTMASDECO") == '4') ? 'checked="checked"' : '').' /></label>
					<div class="margin-form">
						<span><img src="'.$this->getPathUri().'views/assets/img/screen-4.png" style="border:1px solid #dddddd;padding:5px;margin-left:5px;" alt="'.$this->l('Theme 4').'"></span><br /><br />
					</div>
					<br />	
				<br />
				<center><input type="submit" name="submit" value="'.$this->l('Upgrade').'" class="button" /></center>
			</fieldset>	
		</form>';
	}
}