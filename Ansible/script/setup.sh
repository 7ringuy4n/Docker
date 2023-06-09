#!/bin/bash
cmd=$(apt-get update && apt-get install -y ca-certificates curl gnupg apt-transport-https software-properties-common)
cmd=$(install -m 0755 -d /etc/apt/keyrings)
cmd=$(curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg)
cmd=$(chmod a+r /etc/apt/keyrings/docker.gpg)
cmd=$(echo "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null)
cmd=$(apt-get update && apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin)
cmd=$(systemctl enable docker.service)
cmd=$(systemctl enable containerd.service)
cmd=$(chmod 666 /var/run/docker.sock)
cmd=$(bash /home/script/join.sh)