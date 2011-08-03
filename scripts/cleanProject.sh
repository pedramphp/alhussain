#! /bin/sh
rm -rf templates_c/*
rm -rf admin/templates_c/*
rm -rf log/*

chmod "a+w" templates_c/
chmod "a+w" admin/templates_c/
chmod "a+w" log/
chmod "a+w" images/temp/
chmod "a+w" images/gallery/private/original/
chmod "a+w" images/gallery/private/thumb/
chmod "a+w" images/blog/original/
chmod "a+w" images/blog/thumb/
chmod "a+w" images/news/original/
chmod "a+w" images/news/thumb/
chmod "a+w" images/events/
