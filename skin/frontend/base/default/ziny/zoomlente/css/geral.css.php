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

._lente-produto-imagem {
    margin-bottom: 10px;
    position: relative;
    display: block;
    border: 1px solid #ededed;
}
._lente-itens-galeria {
    position: relative;
}
._lente-itens-galeria img {
    max-width: 100%;
    max-height: 750px;
    margin: 0px auto;
    display: none;
}
._lente-itens-galeria img._visivel {
    display:block
}
._zoom-lente {
    width: <?php echo $config['tamanho']; ?>;
    height: <?php echo $config['tamanho']; ?>;
    position: absolute;
    cursor: none;
    <?php if ($config['tipo'] == 'circulo'): ?>
    border-radius:50%;
    <?php endif; ?>
    box-shadow: 0 0 0 <?php echo $config['borda_tamanho']; ?>px rgba(<?php echo $helper->rgb2Hex($config['borda_cor']); ?>,<?php echo $config['transparencia']; ?>), 0 0 <?php echo $config['borda_tamanho']; ?>px <?php echo $config['borda_tamanho']; ?>px rgba(0, 0, 0, .25), inset 0 0 40px 2px rgba(0, 0, 0, .25);
    display: none;
    z-index:999999
}
._lente-imagens-reduzidas li:first-child {
    margin-left: -1px;
}
._lente-imagens-reduzidas li {
    display: inline-block;
}
._lente-imagens-reduzidas span {
    display: inline-block;
    cursor:pointer;
    border: 1px solid transparent;
    list-style: none;
    margin: 0;
    padding: 0;
}
._lente-imagens-reduzidas span:hover, ._lente-imagens-reduzidas span._reduzida-atual {
    border:1px solid #c7c7c7 !important;
}
