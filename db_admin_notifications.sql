array(
'create table olog_adminnotifications_adminnotification (id int not null auto_increment primary key, created_at_ts int not null default 0) engine InnoDB default charset utf8 /* rand9512 */;',
'alter table olog_adminnotifications_adminnotification add column message text     /* rand753701 */;',
'alter table olog_adminnotifications_adminnotification add column status int   not null default 0    /* rand487218 */;',
'create table olog_emailsender_email (id int not null auto_increment primary key, created_at_ts int not null default 0) engine InnoDB default charset utf8 /* rand824 */;',
'alter table olog_emailsender_email add column subject text     /* rand573308 */;',
'alter table olog_emailsender_email add column body text     /* rand605419 */;',
'alter table olog_emailsender_email add column email_to varchar(255)   not null    /* rand614905 */;',
'alter table olog_emailsender_email add column email_from varchar(255)   not null    /* rand483339 */;',
'alter table olog_emailsender_email add column notification_id int   not null    /* rand704530 */;',
'alter table olog_emailsender_email add column status int   not null default 0   /* rand350858 */;',
'insert into olog_auth_permission (title) values ("PERMISSION_ADMINNOTIFICATIONS_MANAGE") /* rand3508582 */;',
'alter table olog_adminnotifications_adminnotification add column emails_is_sent int   not null   default 0  /* rand931616 */;',
'alter table olog_emailsender_email add foreign key FK_notifi_id_1826172_teg (notification_id)  references olog_adminnotifications_adminnotification (id) /* rand931616123 */;',

)
