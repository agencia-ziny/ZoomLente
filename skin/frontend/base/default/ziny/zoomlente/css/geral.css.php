<?php
/**
 * Zoom com Lente
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @category   skin
 * @package    default_ziny
 * @copyright  Copyright (c) 2015 Agência Ziny (www.agenciaziny.com.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Agência Ziny <dev@agenciaziny.com.br>
 */
define('MAGENTO_ROOT', (dirname(__FILE__) . '../../../../../../../../'));

// Mage include
require_once MAGENTO_ROOT . 'app/Mage.php';

umask(0);
Mage::app();

// Get defines
$config = Mage::getStoreConfig('zoomlente/geral');

$helper = Mage::helper('zoomlente/cor');

header("Content-type: text/css; charset: UTF-8");
?>
._zoomlente {
    width: <?php echo $config['tamanho']; ?>;
    height: <?php echo $config['tamanho']; ?>;
    position: absolute;
    cursor: none;
    <?php if ($config['tipo'] == 'circulo'): ?>
    border-radius:50%;
    <?php endif; ?>
    box-shadow: 0 0 0 <?php echo $config['borda_tamanho']; ?>px rgba(<?php echo $helper->rgb2Hex($config['borda_cor']); ?>,<?php echo $config['transparencia']; ?>), 0 0 <?php echo $config['borda_tamanho']; ?>px <?php echo $config['borda_tamanho']; ?>px rgba(0, 0, 0, .25), inset 0 0 40px 2px rgba(0, 0, 0, .25);
    display: none;
}
