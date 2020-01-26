<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Ronmrcdo\Inventory\Models\Product;
use Ronmrcdo\Inventory\Models\Category;
use Ronmrcdo\Inventory\Models\Attribute;
use Ronmrcdo\Inventory\Models\AttributeValue;
use Ronmrcdo\Inventory\Models\ProductSku;
use Ronmrcdo\Inventory\Models\ProductVariant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
	return [
		'category_id' => factory(Category::class)->create()->id,
		'name' => $faker->words(rand(1,3), true),
		'short_description' => $faker->sentences(5, true),
		'description' => $faker->sentences(10, true),
		'is_active' => true
	];
});

$factory->define(Attribute::class, function (Faker $faker) {
	return [
		'product_id' => null, // it should be attach manually
		'name' => $faker->word
	];
});

$factory->define(AttributeValue::class, function (Faker $faker) {
	return [
		'product_attribute_id' => null, // it should be attach manually
		'value' => $faker->word
	];
});

$factory->define(ProductSku::class, function (Faker $faker) {
	return [
		'product_id' => null, // it should be manually added
		'code' => Str::random()
	];
});

$factory->define(ProductVariant::class, function (Faker $faker) {
	return [
		'product_id' => null, // it should be manually added
		'product_sku_id' => null, // it should be manually added
		'product_attribute_id' => null, // it should be manually added
		'product_attribute_value_id' => null // it should be manually added
	];
});