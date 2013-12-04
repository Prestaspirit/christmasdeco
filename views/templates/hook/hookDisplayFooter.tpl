{*
 *  _  _  _ _______ ______  _______ _____ _______ _______
 *  |  |  | |______ |_____] |______   |      |    |______
 *  |__|__| |______ |_____] ______| __|__    |    |______
 *  ______  _______ _    _ _______         _____   _____   _____  _______ _______ _______ __   _ _______
 *  |     \ |______  \  /  |______ |      |     | |_____] |_____] |______ |  |  | |______ | \  |    |
 *  |_____/ |______   \/   |______ |_____ |_____| |       |       |______ | www.website-developpement.fr
 * -----------------------------------------------------------------------------------------------------
 *
 * http://www.prestaspirit.fr
 * @author Pichard Franck - PrestaSpirit <contact@prestaspirit.fr>
 * @copyright  20010-2013 PrestaSpirit
 * @version 1.0
 *
 * -----------------------------------------------------------------------------------------------------
*}

{if isset($deco)}
<div id="christmasdeco_bottom_{$deco}">
	<div class="christmasdeco_{$deco}_left">
		<img src="{$mediaUri}views/assets/img/{$deco}/botleft.png" alt="{l s='Mary Christmas' mod='christmasdeco'}">
	</div>
	<div class="christmasdeco_{$deco}_right">
		<img src="{$mediaUri}views/assets/img/{$deco}/botright.png" alt="{l s='Mary Christmas' mod='christmasdeco'}">
	</div>
</div>
{/if}