const source = "./_source";
const greedy = "**/*";
const assets = "./assets_v_1_0";

const paths = {
	source,
	styles: {
		src: `${source}/sass/${greedy}.scss`,
		dest: "./",
		includes: ["node_modules/bootstrap/scss", `${source}/sass/`],
	},
	scripts: {
		src: `${source}/js/${greedy}.js`,
		entry: "js/index.js",
		dest: `${assets}`,
	},
};

export default paths;
