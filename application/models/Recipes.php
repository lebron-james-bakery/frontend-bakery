<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Gerard
 */
class Recipes extends CI_Model {

	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
	var $recipe = array(
		array('id' => '1', 'name' => 'Applesauce Spice Cake', 'mug' => 'Applesauce_Spice_Cake.jpg', 'where' => '/production/1',
			'ingredients' => '1 can Baker\'s Joy® Original Non-Stick Baking Spray with Flour, 1 16 oz. package Yellow cake mix, 1 3.4 oz. package instant vanilla or butterscotch pudding mix, 4 eggs, 1 cup applesauce, 1 cup water, 1/3 cup vegetable oil, 1/2 tsp. ground nutmeg, 1/4 tsp. ground allspice, confectioner\'s sugar (sprinkled) (optional)'),
		array('id' => '2', 'name' => 'Almond Tea Cake', 'mug' => 'Almond_Tea_Cake.jpg', 'where' => '/production/2',
			'ingredients' => '1 can Baker\'s Joy® Original Non-Stick Baking Spray with Flour, 18 blanched almonds, 1 1/2 cups all purpose flour, 1/3 cups corn starch, 1 tsp. baking powder, 1/2 tsp. salt, 1 1/3 cups butter (melted), 1/4 cup frozen orange juice contentrate (thawed), 1 Tbsp. grated orange peel, 1 1/3 cups sugar, 5 eggs, 5 egg yolks'),
		array('id' => '3', 'name' => 'Apricot Bars', 'mug' => 'Apricot_Bars.jpg', 'where' => '/production/3',
			'ingredients' => '1 can Baker\'s Joy® Original Non-Stick Baking Spray with Flour, 1 cup dried apricots, 1 cup orange juice, 1 1/2 cups quick or old fashioned oats (uncooked), 3/4 cup all-purpose flour, 1/2 cup SugarTwin Granulated Brown or granulated brown sugar, 1 tsp. cinnamon, 1 tsp. baking powder, 1/4 tsp. salt, 1/2 cup butter (melted), 1 tsp. vanilla extract'),
		array('id' => '4', 'name' => 'Blueberry Lemon Coffee Cake', 'mug' => 'BG_Blueberry_Lemmon_Coffee_Cake.jpg', 'where' => '/production/4',
			'ingredients' => '1 can Baker\'s Joy® Original Non-Stick Baking Spray with Flour, 2 cups all purpose flour, 1 tsp. baking soda, 1/2 tsp. salt, 1/2 cup unsalted butter (softened), 1 cup sugar, 2 large eggs, 1 tsp. vanilla extract, 1 8 oz. container sour cream, 2 cups blueberries ((fresh or frozen, thawed)), 1 1/2 cups all-purpose flour, 1/2 cup brown sugar, 1/2 tsp. cinnamon'),
		array('id' => '5', 'name' => 'Chocolate Brownies', 'mug' => 'Chocolate_Brownies.jpg', 'where' => '/production/5',
			'ingredients' => '1 can Baker\'s Joy® Original Non-Stick Baking Spray with Flour, 1 cup all purpose flour, 1/2 cup sugar or sugar twin granulated white, 1/2 cup unsweetened cocoa powder, 1 tsp. baking powder, 1/2 tsp. salt, 3 eggs, 2/3 cup unsweetened applesauce, 1/4 cup unsalted butter (melted), 2 tsp. vanilla extract, 3/4 cup semi-sweet chocolate chips'),
		array('id' => '6', 'name' => 'Swedish Rum Cake', 'mug' => 'Swedish_Rum_Cake.jpg', 'where' => '/production/6',
			'ingredients' => '1.75 cup sugar, 1.75 cup butter (softened), 4 eggs, 2/3 cup milk, 1 Tbsp. dark rum, 1 tsp. lemon peel (grated), 2 1/2 cups all-purpose flour, 2 tsp. baking powder, 1 can Baker\'s Joy® Original Non-Stick Baking Spray with Flour, 1 cup heavy whipping cream, 3 egg yolks, 1/4 tsp. salt'),

        //array('id' => '1', 'name' => 'New York Cheesecake', 'picture')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->recipe as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->recipe;
	}

}
