'use strict';
const Generator = require('yeoman-generator');
const chalk     = require('chalk');
const yosay     = require('yosay');

module.exports = class extends Generator {
  
  prompting(){
    this.log('------------------------------------------------------------------------');
    this.log("                        Creación de proyecto                            ");
    this.log('------------------------------------------------------------------------');
    return this.prompt([
        {
          type: 'input',
          name: 'name',
          message: 'Nombre: ',
          default: this.appname
        },
        {
          type: 'input',
          name: 'description',
          message: 'Descripción: '
        },
        {
          type: 'input',
          name: 'license',
          message: 'Licencia: ',
          default: 'ISC'
        },
        {
          type: 'input',
          name: 'author',
          message: 'Autor: '
        },
        {
          type: 'input',
          name: 'email',
          message: 'Correo: '
        },
        {
          type: 'input',
          name: 'role',
          message: 'Rol',
          default: 'Developer'
        },
        {
          type: 'input',
          name: 'folder',
          message: 'Carpeta principal: ',
          default: 'app'
        }
    ])
    .then( (answers) => {
        this.props = answers;
    });

  }

  writting(){

    this.fs.copyTpl(
      this.templatePath('README.md'),
      this.destinationPath('README.md'),
      {
          description: this.props.description
      }
    );

    this.fs.copyTpl(
      this.templatePath('index.php'),
      this.destinationPath('index.php'),
      {
          folder: this.props.folder
      }
    );

    this.fs.copy(
      this.templatePath('config.php'),
      this.destinationPath('config.php')
    );

    this.fs.copy(
      this.templatePath('.htaccess'),
      this.destinationPath('.htaccess')
    );

    this.fs.copy(
      this.templatePath('.gitignore'),
      this.destinationPath('.gitignore')
    );

    this.fs.copyTpl(
      this.templatePath('composer.json'),
      this.destinationPath('composer.json'),
      {
          name: this.props.name,
          description: this.props.description,
          license: this.props.license,
          author: this.props.author,
          email: this.props.email,
          role: this.props.role,
          folder: this.props.folder,
          folderNamespace: this.props.folder.charAt(0).toUpperCase() + this.props.folder.slice(1)
      }
    );

    this.fs.copyTpl(
      this.templatePath('app/routes/Routes.php'),
      this.destinationPath(this.props.folder + '/routes/Routes.php'),
      {
          folderNamespace: this.props.folder.charAt(0).toUpperCase() + this.props.folder.slice(1)
      }
    );

    this.fs.copyTpl(
      this.templatePath('app/controllers/IndexController.php'),
      this.destinationPath(this.props.folder + '/controllers/IndexController.php'),
      {
          folderNamespace: this.props.folder.charAt(0).toUpperCase() + this.props.folder.slice(1)
      }
    );

    this.fs.copyTpl(
      this.templatePath('app/middlewares/IndexMiddleware.php'),
      this.destinationPath(this.props.folder + '/middlewares/IndexMiddleware.php'),
      {
          folderNamespace: this.props.folder.charAt(0).toUpperCase() + this.props.folder.slice(1)
      }
    );

    this.fs.copyTpl(
      this.templatePath('app/models/Index.php'),
      this.destinationPath(this.props.folder + '/models/Index.php'),
      {
          folderNamespace: this.props.folder.charAt(0).toUpperCase() + this.props.folder.slice(1)
      }
    );

  }

  install() {
    this.spawnCommand('composer', ['install']);
  }
  
};
