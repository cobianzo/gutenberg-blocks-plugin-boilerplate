const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

const extendedEntry = defaultConfig.entry();

// With this, it will create build/block1/frontend.js. And we enqueue it with php.
extendedEntry[ 'block1/frontend' ] = './src/block1/optional-frontend.js';
// console.log( 'coco entry:', extendedEntry );

module.exports = {
	...defaultConfig,
	entry: extendedEntry,
};
