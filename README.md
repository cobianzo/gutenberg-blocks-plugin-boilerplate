# BOILERPLATE for CREATING BLOCKS in the same PLUGIN

This boilerplate was created by:

1. Create a plugin with `@wordpress/create-plugin`
2. Convert the main php file into Object Oriented.
3. Add `phpcs.xml` to use short array nomeclature in phpcs. It expects you to use Wordress-VIP globally.
4. Include `npm` packages, setup `package.json` and config files for linting and avoid conflicts between prettier and eslint.
5. Change folder structure and php file in order to have `block1` and `block2` in the same plugin.

To use it, just

> npm run start

## TODO

Include `husky` and `lint-staged` to run lint on staging files before commiting.
