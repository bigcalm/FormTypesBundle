# How to install


### Step 1: Modify composer.json
``` json
    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "ailove-dev/form-types-bundle",
                "version": "dev-master",
                "source": {
                    "url": "git://github.com/bigcalm/FormTypesBundle.git",
                    "type": "git",
                    "reference": "master"
                },
                "autoload": {
                    "psr-0": {"Ailove\\FormTypesBundle": ""}
                },
                "target-dir": "Ailove/FormTypesBundle"
            }
        }
    ],
    "require": {
        ...
        "ailove-dev/form-types-bundle": "dev-master"
    }
```

### Step 2: Update vendors
``` sh
composer update
```
### Step 3: Enable the bundle
Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Ailove\FormTypesBundle\AiloveFormTypesBundle(),
    );
}
```

### Step 4: Import twig fields template to your config.yml

``` yml
# app/config.yml
twig:
    form:
        resources:
            - 'AiloveFormTypesBundle:Form:fields.html.twig'

```

### Step 5: Configure the bundle

Configuration is done with the twig global `form_types_jquery_ui` array in config.yml

You can either place your options directly in app/config.yml:

``` yml
# app/config.yml
twig:
    global:
        form_types_jquery_ui:
```

Or you can reference them from app/parameters.yml
``` yml
# app/config.yml
twig:
    global:
        form_types_jquery_ui: %form_types_jquery_ui%

# app/parameters.yml
parameters:
    form_types_jquery_ui:
        datepicker:
            dateFormat: dd.mm.yy
```

### Step 5: How to use form types

#### Datepicker

AdminClass:

FormFields

``` php
<?php
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ...
            ->add('startDate', 'sonata_type_datepicker')
            ...
        ;
    }
```

Filters

``` php
<?php
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
	$datagridMapper
	    ->add('startDate', 'doctrine_orm_datepicker', array(), 'sonata_type_datepicker')
	;
}
```
