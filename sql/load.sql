load data local infile '../dataset/User.csv'
into table USER
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_name,
Pwd,
Gender,
Authority
);

load data local infile '../dataset/Video.csv'
into table VIDEO
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r\n'(
Uploader_id,
Video_name,
Video_url,
Upload_date,
Intro
);

load data local infile '../dataset/Following.csv'
into table FOLLOWING
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_id,
Following_id
);

load data local infile '../dataset/Tags.csv'
into table TAG
(Tag_name)
set T_id=NULL;

load data local infile '../dataset/Comment.csv'
into table COMMENT
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Video_id,
User_id,
Content,
Release_date
);

load data local infile '../dataset/Rating.csv'
into table RATING
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_id,
Video_id,
Rate
);

load data local infile '../dataset/video_tag.csv'
into table VIDEO_TAG
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Video_id,
Tag_id
);