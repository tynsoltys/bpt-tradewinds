# Lodgepole

**This project is pretty bare-bones at the moment.  
  Its main goal is to test some new features before they make it into Jackpine.**

Lodgepole is an offshoot of the Jackpine starter theme for WordPress.  
Changes made here will be likely integrated into Jackpine in the future.

Please report any bugs you encounter, and leave any suggestions in the issues.

## Requirements

- PHP >= 7.4
- Node.js >= 12
- WordPress >= 5.3
- Composer
- Yarn Classic

## Usage

### Clone & Setup

```shell script
# Clone the repository
$ git clone https://github.com/aedontanner/lodgepole.git

# Install dependencies
$ composer install && yarn install

# Create development server config
$ yarn run bootstrap
```

### Start development server

```shell script
$ yarn run start
```

### Build for production

```shell script
# Compile assets
$ yarn run build

# Create ZIP file
$ yarn run archive
```

## Folder structure

- `assets` - Stylesheets, scripts, images, etc.
- `templates` - Timber Twig templates
- `theme` - WordPress-specific files

## Acknowledgments

Huge thanks to the folks who made the tools that Lodgepole is built on:

- [Timber](https://github.com/timber/timber)
- [wpack.io](https://github.com/swashata/wp-webpack-script)
- And others.

## License

This software is released under the MIT License.  
See the LICENSE file for details.
