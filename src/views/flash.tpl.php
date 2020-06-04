new Noty({
    type: '<?= $data['type']; ?>',
    layout: 'topRight',
    text: '<?= $data['message']; ?>',
    theme: 'bootstrap-v4',
    progressBar: true,
    timeout: 5000
}).show();