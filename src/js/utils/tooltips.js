export function updateTooltip() {
    const dataToolTips = document.querySelectorAll(
        '[data-tooltip-top], [data-tooltip-right], [data-tooltip-bottom], [data-tooltip-left]'
    )

    dataToolTips.forEach((dataTooltip) => {
        if (dataTooltip.firstChild.className === 'tooltip') {
            return
        }

        const tooltipText = `<span class="tooltip">${
            dataTooltip.dataset.tooltipTop
                ? dataTooltip.dataset.tooltipTop
                : dataTooltip.dataset.tooltipRight
                ? dataTooltip.dataset.tooltipRight
                : dataTooltip.dataset.tooltipBottom
                ? dataTooltip.dataset.tooltipBottom
                : dataTooltip.dataset.tooltipLeft
        }</span>`
        dataTooltip.insertAdjacentHTML('afterbegin', tooltipText)
    })

    const toolTipsClick = document.querySelectorAll('[data-tooltip-copy]')

    toolTipsClick.forEach((toolTipClick) => {
        toolTipClick.addEventListener('click', function () {
            const tooltip = toolTipClick.querySelector('.tooltip')
            tooltip.textContent = toolTipClick.dataset.tooltipCopy
            setTimeout(() => {
                tooltip.textContent = toolTipClick.dataset.tooltipTop
                    ? toolTipClick.dataset.tooltipTop
                    : toolTipClick.dataset.tooltipRight
                    ? toolTipClick.dataset.tooltipRight
                    : toolTipClick.dataset.tooltipBottom
                    ? toolTipClick.dataset.tooltipBottom
                    : toolTipClick.dataset.tooltipLeft
            }, 1000)
        })
    })
}

document.addEventListener('DOMContentLoaded', updateTooltip)
