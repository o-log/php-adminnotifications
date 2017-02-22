array(
'create table olog_adminnotifications_adminnotification (id int not null auto_increment primary key, created_at_ts int not null default 0) engine InnoDB default charset utf8 /* rand9512 */;',
'alter table olog_adminnotifications_adminnotification add column message text     /* rand753701 */;',
'alter table olog_adminnotifications_adminnotification add column status int   not null default 0    /* rand487218 */;',
)
