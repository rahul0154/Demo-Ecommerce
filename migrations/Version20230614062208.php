<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614062208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO user (username, roles, password, first_name, last_name, address, email) VALUES
        (\'admin2\', \'[\"ROLE_ADMIN\"]\', \'$2y$13$ujwtzKdqUX28x7rSP2PfGe1eZqGEBgS1UQxtGaOR6NSBZZD2w7tES\', \'rahul\', \'rahul\', \'address\', \'rahul@demo.com\');');

        $this->addSql("INSERT INTO products (product_name, product_image, list_price, qty_in_stock, part_number, selling_price, product_description)
                          VALUES
                          ('Apple', 'asset/image/Apple.png', '200.00', '2000', 'VEG_1001', '220.00', 'Crisp and juicy, apples are a classic fruit known for their sweet and slightly tart flavor. Perfect for snacking, baking, or adding to salads.'),
                          ('Potato', 'asset/image/Potato.png', '20.00', '2000', 'VEG_1002', '30.00', 'Versatile and comforting, potatoes are a staple vegetable with a creamy texture and mild taste. Great for mashing, roasting, or making French fries.'),
                          ('Onion', 'asset/image/Onion.png', '35.00', '2000', 'VEG_1015', '40.00', 'With a pungent and savory flavor, onions are essential in countless recipes around the world. They add depth and aroma to soups, stews, and stir-fries.'),
                          ('Cabbage', 'asset/image/Cabbage.png', '35.00', '2000', 'VEG_1003', '45.00', 'Cabbage is a crisp and nutritious leafy vegetable with a mildly sweet taste. Its commonly used in coleslaw, salads, and stir-fries.'),
                          ('Tomato', 'asset/image/Tomato.png', '40.00', '2000', 'VEG_1004', '50.00', 'Tomatoes are vibrant and tangy fruits that enhance the flavor of many dishes. Whether sliced in sandwiches, used in sauces, or enjoyed fresh in salads, they are a kitchen staple.'),
                          ('Cauliflower', 'asset/image/Cauliflower.png', '15.00', '2000', 'VEG_1005', '25.00', 'Cauliflower is a versatile and nutritious vegetable known for its mild, nutty flavor. It can be steamed, roasted, or used as a low-carb alternative to rice or mashed potatoes.'),
                          ('Spinach', 'asset/image/Spinach.png', '10.00', '2000', 'VEG_1006', '20.00', 'Packed with vitamins and minerals, spinach is a leafy green vegetable with a delicate flavor. It can be enjoyed raw in salads, sautéed as a side dish, or added to soups and stews.'),
                          ('Brinjal', 'asset/image/Brinjal.png', '50.00', '2000', 'VEG_1007', '60.00', 'Brinjal, also known as eggplant or aubergine, is a versatile vegetable with a rich and meaty texture. It can be grilled, roasted, or used in curries and stir-fries.'),
                          ('Carrot', 'asset/image/Carrot.png', '30.00', '2000', 'VEG_1008', '40.00', 'Carrots are vibrant and crunchy root vegetables with a sweet and earthy taste. They are perfect for snacking, adding color to salads, or using in soups and stews.'),
                          ('Peas', 'asset/image/Peas.png', '70.00', '2000', 'VEG_1009', '80.00', 'Sweet and tender, peas are small green gems packed with vitamins and fiber. They are great as a side dish, in pasta dishes, or added to stir-fries and risottos.'),
                          ('Celery', 'asset/image/Celery.png', '70.00', '2000', 'VEG_1010', '80.00', 'Celery is a crunchy and refreshing vegetable with a mild, herbal flavor. Its commonly used in salads, soups, and as a healthy snack option.'),
                          ('Bitter gourdasset/image/', '.pngBitter gourd', '90.00', '2000', 'VEG_1011', '100.00', 'Bitter gourd, also known as bitter melon, is a unique vegetable with a slightly bitter taste. Its often used in Asian cuisines and known for its health benefits.'),
                          ('Beans', 'asset/image/Beans.png', '60.00', '2000', 'VEG_1012', '70.00', 'Beans are nutritious and versatile legumes with a tender texture and mild flavor. They can be used in salads, soups, stews, or enjoyed as a side dish.'),
                          ('Pumpkin', 'asset/image/Pumpkin.png', '150.00', '2000', 'VEG_1013', '160.00', 'Pumpkins are iconic symbols of autumn and known for their sweet and earthy flavor. They are perfect for baking pies, making soups, or roasting for a delicious side dish.'),
                          ('Cucumber', 'asset/image/Cucumber.png', '70.00', '2000', 'VEG_1014', '160.00', 'Cool and refreshing, cucumbers have a mild and crisp taste. They are commonly used in salads, sandwiches, or as a healthy snack on their own.');");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
