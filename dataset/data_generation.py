import numpy as np
import datetime
import random
import pandas as pd
import string


def random_value_generate(maximum, possibility=()):
    """randomly generate a value in range(maximum), based on given possibility. (if not given, randomly generate)"""
    if len(possibility) == 0:
        # uniform random choice e.g. id generation.
        value = np.random.choice(maximum, 1) + 1    # be careful, value is an array of one element
        return value[0]
    else:
        # non-uniform random sample, i.e. authority -> [Lv 1, Lv 2, Lv 3, Lv 4, Lv 5] = [0.3, 0.2, 0.2, 0.2, 0.1]
        value = np.random.choice(maximum, 1, p=possibility)    # be careful, value is an array of one element
        return str(value[0] + 1)


def random_time(start='2015-01-01', end='2020-03-01', frmt='%Y-%m-%d'):
    """generate release time randomly between start and end"""
    stime = datetime.datetime.strptime(start, frmt)
    etime = datetime.datetime.strptime(end, frmt)

    # stime, etime are time.struct_time object, use them to calculate
    result = random.random() * (etime - stime) + stime

    return result.strftime("%Y-%m-%d %H:%M:%S")


def comment_generate():
    """extract raw comment information from dataset get from Kaggle.com"""
    comment_file_1 = pd.read_csv('dataset/GBcomments.csv', error_bad_lines=False, dtype=object)
    comment_file_2 = pd.read_csv('dataset/UScomments.csv', error_bad_lines=False, dtype=object)
    comments = pd.concat([comment_file_1, comment_file_2])['comment_text']
    comments.to_csv('dataset/Comments.csv', encoding='utf-8')


def video_info():
    """extract video title, url, description information from dataset get from Kaggle.com"""
    info_file = pd.read_csv('dataset/Youtube Video Dataset.csv', error_bad_lines=False, encoding='utf-8')
    titles = info_file['Title']
    video_url = info_file['Videourl']
    intros = info_file['Description']
    output = pd.DataFrame({'title': titles, 'url': video_url, 'intro': intros})
    output.to_csv('dataset/video_info.csv', encoding='utf-8')


def tag_generate(number):
    """generate data for Tags table"""
    video_file_1 = pd.read_csv('dataset/GBvideos.csv', error_bad_lines=False)
    video_file_2 = pd.read_csv('dataset/USvideos.csv', error_bad_lines=False)
    raw_tags = pd.concat([video_file_1, video_file_2])['tags'] # raw_tags are in the form of 'tag1|tag2|tag3|tag4'
    tags = set()
    for each_group in raw_tags:
        if each_group != '[none]':
            temp = each_group.split('|')
            for each_element in temp:
                if each_element.replace(' ', '').isalpha():
                    tags.add(each_element)
    tags = list(tags)
    print(tags)
    output = pd.DataFrame({'tag': tags})[:number]
    output.to_csv('dataset/load/Tags.csv', encoding='utf-8', index=False, header=False)


def password_generate():
    # characters and numbers
    all_str = string.ascii_letters + string.digits

    # randomly generate a 8-digit string
    res = ''.join(random.sample(all_str, 8))
    return res


def username_generate():
    # generate 8-digit string
    res = ''.join(random.sample(string.ascii_letters, 4)) + ''.join(random.sample(string.digits, 4))
    return res


def user_data(number):
    """create dataset fits the schema of USER table, given number of rows needed
    (Uid[auto_increase], User_name[var], password[var], gender[var], autority[var])"""
    Usernames = []
    Pwds = []
    genders = []
    authority = []
    for i in range(number):
        Usernames.append(username_generate())
        Pwds.append(password_generate())

        gender = random_value_generate(2)
        if gender == 0:
            genders.append('F')
        else:
            genders.append('M')

        authority.append(random_value_generate(5, (0.3, 0.2, 0.2, 0.2, 0.1)))

    output = pd.DataFrame({'User_name': Usernames, 'Pwd': Pwds, 'Gender': genders, 'Authority': authority})
    output.to_csv('dataset/load/User.csv', index=False, header=False, encoding='utf-8')


def video_data(number, max_userid):
    """generate data for video table"""
    video_info_file = pd.read_csv('dataset/video_info.csv')[1:number+1]
    upload_ids = [random_value_generate(max_userid) for _ in range(number)]
    video_names = video_info_file['title']
    video_urls = video_info_file['url']
    release_dates = [random_time() for _ in range(number)]

    raw_video_intros = video_info_file['intro']
    # each intro may have [commas,\n,"], which will affect reading of csv file
    video_intros = []
    for each in raw_video_intros:
        # add double quotes
        video_intros.append(each + '\r\n')

    output = pd.DataFrame({'Uploader_id': upload_ids, 'Video_name': video_names, 'Video_url': video_urls,
                           'Upload_date': release_dates, 'Intro': video_intros})
    output[:number].to_csv('dataset/load/Video.csv', index=False, header=False, encoding='utf-8')


def following_data(number, max_userid):
    """generate data for Following table"""
    user_ids = [random_value_generate(max_userid) for _ in range(number)]
    following_ids = [random_value_generate(max_userid) for _ in range(number)]

    # users cannot follow themselves
    user_result = []
    following_result = []
    for i in range(number):
        if user_ids[i] != following_ids[i]:
            user_result.append(user_ids[i])
            following_result.append(following_ids[i])

    output = pd.DataFrame({'User_id': user_result, 'Following_id': following_result})
    output.to_csv('dataset/load/Following.csv', index=False, header=False, encoding='utf-8')


def comment_data(number, max_userid, max_videoid):
    """generate data for Comment table"""
    Video_ids = [random_value_generate(max_videoid) for _ in range(number)]
    User_ids = [random_value_generate(max_userid) for _ in range(number)]
    Comment_text = pd.read_csv('dataset/Comments.csv')[:number]['comment_text']
    release_dates = [random_time() for _ in range(number)]

    output = pd.DataFrame({'Video_id': Video_ids, 'User_id': User_ids, 'Content Text': Comment_text,
                           'Release_date': release_dates})
    output.to_csv('dataset/load/Comment.csv', index=False, header=False, encoding='utf-8')


def rating_data(number, max_rate, max_userid, max_videoid):
    """generate data for Rating table"""
    User_ids = [random_value_generate(max_userid) for _ in range(number)]
    Video_ids = [random_value_generate(max_videoid) for _ in range(number)]
    rates = [round(random.uniform(0, max_rate), 2) for _ in range(number)]
    output = pd.DataFrame({'User_id': User_ids, 'Video_id': Video_ids, 'Rate': rates})
    output.to_csv('dataset/load/Rating.csv', index=False, header=False, encoding='utf-8')


def video_tag_data(number, max_videoid, max_tagid):
    """generate data for VIDEO_TAG table"""
    video_ids = [random_value_generate(max_videoid) for _ in range(number)]
    tag_ids = [random_value_generate(max_tagid) for _ in range(number)]

    output = pd.DataFrame({'Video_id': video_ids, 'Tag_id': tag_ids})
    output.to_csv('dataset/load/video_tag.csv', index=False, header=False, encoding='utf-8')
#
#
# user_data(100)
# video_data(100, 100)
# following_data(100, 100)
# comment_data(100, 100, 100)
# rating_data(100, 5, 100, 100)
# tag_generate(100)
# video_tag_data(100, 100, 100)
