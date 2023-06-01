#!/bin/bash
export MasterIP='172.16.2.43'
#MasterIP=$(hostname -I)
Nodeuser='tringuyen'
Node01='172.16.2.44'

apt-add-repository --yes ppa:ansible/ansible && apt update && apt install -y ansible
cat <<EOF | tee /etc/ansible/hosts
[Nodes]
node01 ansible_host=$Node01 ansible_port=22 ansible_user=$Nodeuser
EOF

sysctl -w net.ipv6.conf.all.disable_ipv6=1
sysctl -w net.ipv6.conf.default.disable_ipv6=1
sysctl -w net.ipv6.conf.lo.disable_ipv6=1
sysctl --system

apt-get update
apt-get install -y \
   ca-certificates \
   curl \
   gnupg \
   apt-transport-https \
   software-properties-common

install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
chmod a+r /etc/apt/keyrings/docker.gpg

echo \
 "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
 "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | \
 tee /etc/apt/sources.list.d/docker.list > /dev/null

apt-get update
apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

systemctl enable docker.service
systemctl enable containerd.service
chmod 666 /var/run/docker.sock
usermod -aG docker $USER
chown -R $USER:$USER ./script/
chmod -R 777 ./script/
docker swarm init --advertise-addr $MasterIP >> ./script/adminconfig.txt
sed -n '5p' ./script/adminconfig.txt >> ./script/join.sh
ansible-playbook Setup.yml -l node01 --become --ask-become-pass
sleep 30
docker stack deploy -c docker-compose.yml nextcloud