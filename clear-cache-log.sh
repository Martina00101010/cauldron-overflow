cd var/log
truncate -s 0 dev.log
cd -

cd var/cache/dev
cd profiler
rm -rf *
cd -
rm -rf srcApp_Kernel*
rm -rf Url*
rm -rf Container*
truncate -s 0 annotations.map
