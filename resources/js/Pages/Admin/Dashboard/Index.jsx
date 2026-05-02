// import Head and Link dari Inertia
import { Head } from "@inertiajs/react";

// import LayoutApp
import LayoutApp from "@/Layouts/LayoutApp";

import { useState } from "react";
import {
    LineChart,
    Line,
    XAxis,
    YAxis,
    CartesianGrid,
    Tooltip,
    ReferenceLine,
    ResponsiveContainer,
    Legend,
} from "recharts";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";

const BULAN = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "Mei",
    "Jun",
    "Jul",
    "Agu",
    "Sep",
    "Okt",
    "Nov",
    "Des",
];

export default function Dashboard({ trendData, tahunList }) {
    const [selectedTahun, setSelectedTahun] = useState(tahunList[0]);

    const rawData = trendData[selectedTahun] ?? {};

    const chartData = BULAN.map((label, i) => ({
        bulan: label,
        meter: rawData[i + 1] ?? 0,
    }));

    const values = chartData.map((d) => d.meter);

    const validValues = values.filter((v) => v > 0);

    const avg =
        validValues.length > 0
            ? Math.round(
                  validValues.reduce((a, b) => a + b, 0) / validValues.length,
              )
            : 0;

    const max = Math.max(...values);
    const min = Math.min(...values);

    return (
        <>
            <Head title={`Dashboard`} />
            <LayoutApp>
                <div className="p-6 space-y-6">
                    {/* Header + filter */}
                    <div className="flex items-center justify-between">
                        <Select
                            value={String(selectedTahun)}
                            onValueChange={(value) =>
                                setSelectedTahun(Number(value))
                            }
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Pilih Tahun" />
                            </SelectTrigger>
                            <SelectContent>
                                {tahunList.map((t) => (
                                    <SelectItem key={t} value={String(t)}>
                                        {t}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                    </div>

                    {/* Metric cards */}
                    <div className="grid grid-cols-3 gap-3">
                        {[
                            { label: "Rata-rata/bulan", value: avg },
                            { label: "Tertinggi", value: max },
                            { label: "Terendah", value: min },
                        ].map(({ label, value }) => (
                            <div
                                key={label}
                                className="bg-muted rounded-lg p-4"
                            >
                                <p className="text-xs text-muted-foreground mb-1">
                                    {label}
                                </p>
                                <p className="text-lg font-medium">
                                    {value} kWh
                                </p>
                            </div>
                        ))}
                    </div>

                    {/* Chart */}
                    <ResponsiveContainer width="100%" height={300}>
                        <LineChart
                            data={chartData}
                            margin={{
                                top: 20,
                                right: 30,
                                left: 0,
                                bottom: 0,
                            }}
                        >
                            <CartesianGrid
                                strokeDasharray="3 3"
                                stroke="rgba(128,128,128,0.15)"
                            />
                            <XAxis dataKey="bulan" tick={{ fontSize: 12 }} />
                            <YAxis
                                tick={{ fontSize: 11 }}
                                tickFormatter={(v) => `${v} kWh`}
                            />
                            <Tooltip
                                formatter={(v) => [`${v} kWh`, "Jumlah Meter"]}
                            />
                            <Legend />
                            <ReferenceLine
                                y={avg}
                                stroke="#E24B4A"
                                strokeDasharray="6 4"
                                label={{ value: "avg", fontSize: 11 }}
                            />
                            <Line
                                type="monotone"
                                dataKey="meter"
                                name="Jumlah Meter"
                                stroke="#378ADD"
                                strokeWidth={2}
                                dot={{ r: 4 }}
                                activeDot={{ r: 6 }}
                            />
                        </LineChart>
                    </ResponsiveContainer>
                </div>
            </LayoutApp>
        </>
    );
}
