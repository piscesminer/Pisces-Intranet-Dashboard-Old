#!/bin/bash
date
for i in `seq 1 5`
do
{
    echo "sleep 5"
    sleep 5
} &
done
wait  ##等待所有子后台进程结束
date
