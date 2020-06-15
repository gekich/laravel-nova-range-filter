# Laravel Nova Range Filter
simple range filter for laravel nova v3+
Filter fields by numeric values


### Install

```
composer require gekich/nova-range-filter
```
Create new filter using, nova:filter, for example:
```
php artisan nova:filter AgeFilter
```
Make your newly created class extend ```Gekich\NovaRangeFilter\NovaRangeFilter```: 
```php
use Gekich\NovaRangeFilter\NovaRangeFilter;
...
class AgeFilter extends NovaRangeFilter 
{
//
}
```
Remove all code from newly created class AgeFilter, and leave only: 
```php
public $name = 'Age filter';
public $column = 'age';
```
Where ```$column``` - column to be filtered
      ```$name``` - name of the filter. 


### Usage 


Filter is ready to use. You can apply this filter to any float/integer fields 


![Example usage](https://i.imgur.com/3rg9fr9.png)


### Contributing

Feel free to suggest changes, ask for new features or fix bugs yourself. 

This is my first open source package, hope it will be usefull for you.
