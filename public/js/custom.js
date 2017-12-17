$(document).readdy(function () {

	$('$languageSwitch').change(function () {
		var locale = $(this).val();

		var _token = $("input[name=_token]").val();

		a.ajax({
			url: "/admin/language",
			type: 'POST', 
			data: {locale: locale, _token: _token},
			datatype: 'json', 
			success: function () {

			},
			error: function () {

			},
			beforeSend: function () {

			},
			complete: function () {
				window.location.reload(true);
			}
		});

	});
});