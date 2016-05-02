# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "at15/lnmp7"
  config.vm.box_check_update = false
  config.vm.network "private_network", ip: "192.168.33.10"

  # disable default sync folder
  config.vm.synced_folder ".", "/vagrant", \
      :disabled => true

  # mount bform, bform-api, bform-web
  config.vm.synced_folder ".", "/bform/bform", \
       :create => true, \
       :mount_options  => ['dmode=777,fmode=777']

  config.vm.synced_folder "../bform-api", "/bform/bform-api", \
        :create => true, \
        :mount_options  => ['dmode=777,fmode=777']

  config.vm.synced_folder "../bform-web", "/bform/bform-web", \
        :create => true, \
        :mount_options  => ['dmode=777,fmode=777']
end
