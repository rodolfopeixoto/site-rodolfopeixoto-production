(function($) {

    $.fn.customSelect = function(options) {

        var settings = $.extend({
            "speed" : 250               //скорость открытия и закрытия кастомного селекта
        }, options);

        return this.each(function() {

            var _this = $(this); //элемент к которому применяется плагин

            _this.hide();       //прячем селект

            _this.wrap('<div class="custom-select-wrapper"></div>');  //оборачиваем селект в отдельный див
            
            var _thisParent = _this.parent('.custom-select-wrapper');   //обертка селекта

            _this.after('<div class="custom-select-box"></div>');  //создаем блок в котором будет кастомный селект

            _thisParent.find('.custom-select-box').append('<div class="custom-select-button"></div>')
                .append('<ul class="custom-select-ul"></ul>');      //создаем кнопку для селекта и список

            var customSelectButton = _thisParent.find('.custom-select-button');     //переменная кнопки кастомного селекта

            var customSelectUl = _thisParent.find('.custom-select-ul');     //переменная списк ul кастомного селекта

            _thisParent.find('.custom-select-ul').hide();   //прячем список

            _this.find('option').each(function () {     //перебираем все опции селекта и создаем li в списке
                var optionText =  $(this).text();
                customSelectUl.append('<li>' + optionText + '</li>');
            });

            //выводим текст выбраной опции селекта в кнопку кастомного селекта
            customSelectButton.append('<span></span>');
            customSelectButton.find('span').text(_this.find('option:selected').text());

            //открываем и закрываем селект
            customSelectButton.on('click', function () {
                if($(this).hasClass('custom-select-opened')){
                    $(this).removeClass('custom-select-opened');
                    $(this).parent('.custom-select-box').removeClass('custom-select-box-opened');
                    $(this).next(customSelectUl).slideUp(settings.speed);
                }else{
                    $('.custom-select-button').removeClass('custom-select-opened');
                    $('.custom-select-button').parent('.custom-select-box').removeClass('custom-select-box-opened');
                    $('.custom-select-ul').slideUp(settings.speed);
                    $(this).addClass('custom-select-opened');
                    $(this).parent('.custom-select-box').addClass('custom-select-box-opened');
                    $(this).next(customSelectUl).slideDown(settings.speed);
                }
            });

            //при выборе опции кастомный селекты закрывается, меняеться текст в кнопке и значение в самом селекте
            customSelectUl.find('li').on('click', function () {
                var liIndex = $(this).index();
                var liText = $(this).text();
                $(this).parent('.custom-select-ul').slideUp(settings.speed);
                $(this).parent('.custom-select-ul').prev('.custom-select-button').removeClass('custom-select-opened').text(liText);
                $(this).parents('.custom-select-box').prev('select').find('option').eq(liIndex).prop('selected', true);
                $(this).parent('.custom-select-ul').prev('.custom-select-button').parent('.custom-select-box').removeClass('custom-select-box-opened');
                _this.trigger('change');
            });

            //если нативный селект изменяется, например стороним скриптом, меняем и кастомный селект (для активации нужно прописать trigger('change'))
            _this.on('change', function () {
                customSelectButton.text(_this.find('option:selected').text());
            });

            //закрываем кастомный селект при клике в любом месте
            $(document).on('click', function (event) {
                if ($(event.target).closest($('.custom-select-wrapper')).length) return;
                $('.custom-select-ul').slideUp(settings.speed);
                $('.custom-select-button').removeClass('custom-select-opened');
                $('.custom-select-button').parent('.custom-select-box').removeClass('custom-select-box-opened');
                event.stopPropagation();
            });

        });

    };

})(jQuery);
