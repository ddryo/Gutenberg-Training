import {registerBlockType} from '@wordpress/blocks';

console.log('aaa');
registerBlockType('myguten/test-block', {
    title: 'Basic Example',
    icon: 'smiley',
    category: 'layout',
    edit: () => <div>Hola, mundo!</div>,
    save: () => <div>Hola, mundo!</div>
});
