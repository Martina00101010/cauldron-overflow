/**
 * Simple (ugly) code to handle the comment vote up/down
 */
var $container = $('.js-vote-arrows');
$container.find('a').on('click', function(e) {
    e.preventDefault();
    var $link = $(e.currentTarget);
    console.log($link.data('isDirectionUp'));
    $.ajax({
        url: '/comments/10/vote/'+$link.data('isDirectionUp'),
        method: 'POST'
    }).then(function(responseData) {
        $container.find('.js-vote-total').text(responseData.votes);
    });
});
