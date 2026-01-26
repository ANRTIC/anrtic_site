document.addEventListener('livewire:load', function () {
    // Synchroniser le contenu Froala avec Livewire lors de la soumission du formulaire
    Livewire.on('submitForm', () => {
        const content = $('#froala-editor').froalaEditor('html.get'); // Récupérer le contenu de Froala
        @this.set('content', content); // Envoyer le contenu à Livewire
    });
});

Livewire.on('resetFroalaEditor', () => {
    const content = @this.get('content');  // Récupérer le contenu mis à jour
    $('#froala-editor').froalaEditor('html.set', content);  // Réinitialise Froala avec le contenu mis à jour
});
