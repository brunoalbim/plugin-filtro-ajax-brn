jQuery('input[type="checkbox"]').change(function() {
    // Verifique se pelo menos um checkbox está selecionado
    if (jQuery('input[type="checkbox"]:checked').length > 0) {
        // Obtenha os valores dos checkboxes selecionados
        var selectedValues = jQuery('input[type="checkbox"]:checked').map(function() {
            return this.value;
        }).get();

        // Atualize a URL com os valores selecionados (opcional)
        var queryString = selectedValues.join(',');
        window.history.replaceState(null, null, "?filtro=" + queryString);

        // Atualize a div com o conteúdo obtido
        jQuery('#posts-filter-custom').load(' #posts-filter-custom >');
    } else {
        // Se nenhum checkbox estiver selecionado, redefina a URL (opcional)
        window.history.replaceState(null, null, '?');

        // Restaure o conteúdo da div para o conteúdo inicial
        jQuery('#posts-filter-custom').load(' #posts-filter-custom >');
    }
});