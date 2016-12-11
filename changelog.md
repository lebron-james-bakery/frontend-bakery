# Lebron James Bakery Logs
All notable changes to this project will be documented in this file. Most recent updates are on top.
Team members:
@New3
@AlexandyZ
@Tracy815
@gerardng

## [2.0.0] - 2016-12-11
### Changed 2016-12-10
- Receiving page forms properly adding up to inventory quantity @gerardng
- Added prepare function to convert receiving inventory into on-hand quantity @gerardng
- Rewrite the production feature @AlexandyZ

### Changed 2016-12-09
- fixed Receiving page properly connecting to Supplies table in backend DB @gerardng
- updated database values to align with units @New3

### Changed - 2016-12-08
- redesigned Home page to track capital, total sales, ingredients consumed, receiving orders @gerardng
- Delete the productions model and create Recipe_supply model instead @AlexandyZ

### Added - 2016-12-07
- Separated front & backend features @AlexandyZ @New3
- Remodeled database @AlexandyZ
- Implemented tracking of store money @gerardng

### Added - 2016-12-04
- Added user-role function in using Toggle controller @gerardng
- Gated Receiving, Production, Sales to only admit admin roles @gerardng
- Refactored navigation bar to use navbar.php as view @gerardng
- Deleted unused files such as _menubar.php and _template.php @gerardng
- Added Administrator controller @New3
- Added Administrator_receiving_view and Administrator_receiving-edit_view @New3
- Added CRUD functions for controllers @New3

### Changed - 2016-12-03
- Modified Receiving controller , added CRUD functional @New3
- Modified Supplies model to get the data from database @New3
- Modified receiving_view and Inventory_view to show data from database @New3

### Added - 2016-12-01
- Added MY_Model and mtce-errors view @New3
- Added caboose and restful in the third party folder @New3
- Added dump database in the data folder @AlexandyZ

## [1.0.0] - 2016-10-09
### Added
- Released version 1.0.0

## [Unreleased] - 2016-10-03
### Added - 2016-10-09
- Added css stylesheets and @gerardng @New3 @AlexandyZ
- Implemented countTo js @gerardng

### Changed - 2016-10-09
- Redesigned template.php, configured dashboard/homepage controller to reflect other changes @gerardng
- Fix receiving and inventory views with tables @Tracy815
- Changed the supplies model, modified the data @Tracy815
- Updated Salesmenu and sale_view pages @New3
- Update styles of production_view, recipe_view, update the bootstrap css to latest version @AlexandyZ

### Added - 2016-10-07
 - Create Sales_Sub controller as a sub-controller
 - Create Salesmenu view for the ales_Sub controller @New3
 
### Changed - 2016-10-06
 - Renamed Bakery.php to Logs.php as the model @gerardng
 - Changed page title in MyController to "Lebron James Bakery" @gerardng

### Added - 2016-10-05
 - Create Recipes Model
 - Create Production/Recipe controllors, and related views @AlexandyZ

 ### Added - 2016-10-05
  - Receiving Controller, Supplies Model and receiving_view @Tracy815

### Added - 2016-10-05
 - Sales Controller, Stock Model and sales_view View @New3
 
### Added - 2016-09-30 
- created base template @gerardng, @New3, @AlexandyZ