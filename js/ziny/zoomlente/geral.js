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

var $j = jQuery.noConflict();

$j(function () {

    var _a = 0,
            _b = 0,
            _c,
            _d,
            _e = $j('.product-img-box').find('img').eq(0),
            _x = {
                _h: _e
            },
    mouse = {
        x: 0,
        y: 0
    };

    if (_x._h.length) {

        var div = document.createElement('div');
        div.setAttribute('class', '_zoomlente');
        _x._f = $j(div);

        $j('body').append(div);
    }

    var _movimento = function (e) {

        var _c_offset = _d.offset();

        mouse.x = e.pageX - _c_offset.left;
        mouse.y = e.pageY - _c_offset.top;

        if (
                mouse.x < _d.width() &&
                mouse.y < _d.height() &&
                mouse.x > 0 &&
                mouse.y > 0
                ) {

            _c(e);
        }
        else {
            _x._f.fadeOut(100);
        }

        return;
    };

    var _c = function (e) {

        var rx = Math.round(mouse.x / _d.width() * _a - _x._f.width() / 2) * -1,
                ry = Math.round(mouse.y / _d.height() * _b - _x._f.height() / 2) * -1,
                ps = rx + "px " + ry + "px",
                _f_left = e.pageX - _x._f.width() / 2,
                _f_top = e.pageY - _x._f.height() / 2;

        _x._f.css({
            left: _f_left,
            top: _f_top,
            backgroundPosition: ps
        });

        return;
    };

    $j.fn.elevateZoom = function (options) {

        return;
    };

    _e.on('mousemove', function () {

        _x._f.fadeIn(100);

        _d = $j(this);

        var src = _d.data('large') || _d.attr('src');

        _d.data('imagem-real', true);

        if (src) {
            _x._f.css({
                'background-image': 'url(' + src + ')',
                'background-repeat': 'no-repeat'
            });
        }

        if (!_d.data('largura')) {

            var _o = new Image();

            _o.onload = function () {

                _a = _o.width;
                _b = _o.height;

                _d.data('largura', _a);
                _d.data('altura', _b);

                _movimento.apply(this, arguments);

                _x._f.on('mousemove', _movimento);
            };

            _o.src = src;

            return;
            
        } else {

            _a = _d.data('largura');
            _b = _d.data('altura');
        }

        _movimento.apply(this, arguments);

        _x._f.on('mousemove', _movimento);
    });

    _x._f.on('mouseout', function () {

        _x._f.off('mousemove', _movimento);
    });
});