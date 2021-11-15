const PasaportContract = artifacts.require("PasaportContract");

module.exports = async function (deployer) {
  await deployer.deploy(PasaportContract);
};
