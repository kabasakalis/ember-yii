<?php

class m121020_230247_create_user_contacts_tables extends CDbMigration
{
    public function up()
  	{
          $this->execute('
      		DROP TABLE IF EXISTS `user`;
      		CREATE TABLE `user` (
      			`id` int(11) NOT NULL AUTO_INCREMENT,
      			`username` varchar(45) DEFAULT NULL,
      			`password` varchar(255) DEFAULT NULL,
      			`salt` varchar(255) DEFAULT NULL,
      			`password_strategy` varchar(50) DEFAULT NULL,
      			`requires_new_password` tinyint(1) DEFAULT NULL,
      			`reset_token` varchar(255) DEFAULT NULL,
      			`email` varchar(255) DEFAULT NULL,
      			`login_attempts` int(11) DEFAULT NULL,
      			`login_time` int(11) DEFAULT NULL,
      			`login_ip` varchar(32) DEFAULT NULL,
      			`validation_key` varchar(255) DEFAULT NULL,
      			`create_id` int(11) DEFAULT NULL,
      			`create_time` int(11) DEFAULT NULL,
      			`update_id` int(11) DEFAULT NULL,
      			`update_time` int(11) DEFAULT NULL,
      			PRIMARY KEY (`id`),
      			UNIQUE KEY `username` (`username`),
      			UNIQUE KEY `email` (`email`)
      		) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ');

  		/* add demo users */
  		$demoUser = new User();
  		$demoUser->username = "demo";
  		$demoUser->email = "demo@demo.com";
  		$demoUser->password = "demo1111";

  		$demoUser->save();

  		$adminUser = new User();
  		$adminUser->username = "admin";
  		$adminUser->email = "admin@admin.com";
  		$adminUser->password = "admin1111";

  		$adminUser->save();

          $this->execute('
          CREATE TABLE IF NOT EXISTS `contact` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `first_name` varchar(20) DEFAULT NULL,
            `last_name` varchar(45) DEFAULT NULL,
            `email` varchar(45) DEFAULT NULL,
            `notes` longtext,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT="Contact Information.Demo for Yii-Ember App." AUTO_INCREMENT=31 ;');


          	/* add Contacts */

          $people = array(
                        'doe' => array(
                            'first_name' => 'John',
                            'last_name' => 'Doe',
                            'email' => 'doe@doe.com',
                            'notes' => 'Famous Demo Guy.Nough said'
                        ),
                        'diamond' => array(
                            'first_name' => 'King',
                            'last_name' => 'Diamond',
                            'email' => 'diamond@diamond.com',
                            'notes' => 'Metal Icon figure.'
                        ),
                        'donati' => array(
                            'first_name' => 'Virgil',
                            'last_name' => 'Donati',
                            'email' => 'donati@don.com',
                            'notes' => 'World class drummer,famous for his polyrhythmic patterns'
                        ),
                        'papandreou' => array(
                            'first_name' => 'George',
                            'last_name' => 'Papandreou',
                            'email' => 'traitor@ofgreece.com',
                            'notes' => 'Former Prime Minister Of Greece,he is the man that put Greece under IMF control.
                                                                                         He currently teaches in  Harvard courses like "Effective Nation Obliteration Techniques." Wanted.'
                        ),
                        'corliss' => array(
                            'first_name' => 'Jeb',
                            'last_name' => 'Corliss',
                            'email' => 'corliss@cor.com',
                            'notes' => 'Wingsuit Promixity Professional.Look him up in youtube,will blow your mind.'
                        ),
                    );

                    foreach ($people as $person) {
                        $contact = New Contact();
                        $contact->first_name = $person['first_name'];
                        $contact->last_name = $person['last_name'];
                        $contact->email = $person['email'];
                        $contact->notes = $person['notes'];
                        $contact->save();
                    }
  	}

    public function down()
  	{
  		$this->dropTable('user');
          $this->dropTable('contact');
  	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}